<x-app-layout>
    @if(session('success'))
        <div id="successMessage" class="bg-green-200 text-green-800 p-4 text-center mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div id="errorMessage" class="bg-red-600 text-white p-4 text-center mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="flex justify-center items-center space-x-4 mt-24">
        <!-- Search bar and button -->
        <div class="flex items-center space-x-4">
            <form action="{{ route('dashboard') }}" method="GET" class="flex space-x-4">
                <input type="text" name="search" placeholder="Search by name or description" value="{{ request()->query('search') }}"
                       class="form-input px-4 py-2 w-64 rounded border border-gray-300 shadow-sm">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Search
                </button>
            </form>
        </div>

        <!-- Add Image button -->
        <button
            id="openModalButton"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
        >
            Add Image
        </button>
    </div>

    <!-- Modal -->
    <div id="productModal" class="fixed z-10 inset-0 overflow-y-auto hidden">
        <div class="flex items-center justify-center min-h-screen">
            <div class="bg-white w-1/2 p-6 rounded shadow-lg">
                <button id="closeModalButton" class="absolute top-0 right-0 mr-4 mt-4 text-gray-600 hover:text-gray-800">
                    &times;
                </button>
                <h2 class="text-2xl font-bold mb-4">Add Product</h2>
                <!-- Form -->
                <form action="{{ route('dashboard.products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700">Product Name:</label>
                        <input type="text" name="name" id="name" class="form-input mt-1 block w-full" required>
                    </div>
                    <div class="mb-4">
                        <label for="description" class="block text-gray-700">Description:</label>
                        <textarea name="description" id="description" class="form-textarea mt-1 block w-full" required></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="image" class="block text-gray-700">Image (The file must be a JPEG, PNG, JPG, or GIF image.):</label>
                            <input type="file" name="image" id="image" accept="image/jpeg, image/png, image/jpg, image/gif" required>
                    </div>
                    <div class="text-right">
                        <button
                            type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        >
                            Submit
                        </button>
                        <button
                            type="button"
                            id="cancelButton"
                            class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline ml-2"
                        >
                            Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

        <div class="container mx-auto mt-8">
            <div class="flex flex-wrap -mx-4 mt-12">
                @foreach($products as $product)
                    <div class="w-full sm:w-1/2 lg:w-1/4 px-4 mb-8">
                        <div class="border rounded-lg overflow-hidden shadow-lg relative bg-gray-100">
                            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover cursor-pointer" onclick="openModal('{{ asset($product->image) }}')">
                            <div class="absolute top-0 right-0 m-2 flex space-x-2">
                                <form id="deleteForm{{ $product->id }}" action="{{ route('products.destroy', $product) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" onclick="confirmDelete({{ $product->id }})" class="text-red-500 hover:text-red-700">
                                        <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                        </svg>
                                    </button>
                                </form>
                                <a href="{{ route('products.download', $product->id) }}" class="text-green-500 hover:text-green-700">
                                    <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 15v2a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3v-2m-8 1V4m0 12-4-4m4 4 4-4"/>
                                    </svg>
                                </a>
                            </div>
                            <div class="p-4 bg-gray-900 bg-opacity-75 text-white">
                                <h3 class="text-lg font-semibold">{{ $product->name }}</h3>
                                <p class="mt-2">{{ $product->description }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <script>
            function confirmDelete(productId) {
                if (confirm('Are you sure you want to delete this product?')) {
                    document.getElementById('deleteForm' + productId).submit();
                }
            }
        </script>


        <div id="imageModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black bg-opacity-75">
        <div class="relative">
            <img id="modalImage" src="" class="max-w-full max-h-screen">
            <button onclick="closeModal()" class="text-orange-700 absolute top-0 right-0 mt-4 mr-4 text-4xl">&times;</button>
        </div>
    </div>

    <div id="deleteModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black bg-opacity-75">
        <div class="bg-white w-1/3 p-6 rounded shadow-lg">
            <h2 class="text-xl font-bold mb-4">Confirm Deletion</h2>
            <p>Are you sure you want to delete this image?</p>
            <div class="text-right mt-4">
                <button id="confirmDeleteButton" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                    Delete
                </button>
                <button onclick="closeDeleteModal()" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded ml-2">
                    Cancel
                </button>
            </div>
        </div>
    </div>


    <script>
        // Get modal and button elements
        const modal = document.getElementById('productModal');
        const openModalButton = document.getElementById('openModalButton');
        const closeModalButton = document.getElementById('closeModalButton');
        const cancelButton = document.getElementById('cancelButton');

        function openModal(imageSrc) {
            document.getElementById('modalImage').src = imageSrc;
            document.getElementById('imageModal').classList.remove('hidden');
            document.getElementById('imageModal').classList.add('flex');
        }

        function closeModal() {
            document.getElementById('imageModal').classList.remove('flex');
            document.getElementById('imageModal').classList.add('hidden');
        }

        let deleteFormId;

        function confirmDelete(productId) {
            deleteFormId = productId;
            document.getElementById('deleteModal').classList.remove('hidden');
            document.getElementById('deleteModal').classList.add('flex');
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.remove('flex');
            document.getElementById('deleteModal').classList.add('hidden');
        }

        document.getElementById('confirmDeleteButton').onclick = function() {
            document.getElementById('deleteForm' + deleteFormId).submit();
        };

        // Add event listener to open modal button
        openModalButton.addEventListener('click', function() {
            modal.classList.remove('hidden');
        });

        // Add event listener to close modal button
        closeModalButton.addEventListener('click', function() {
            modal.classList.add('hidden');
        });

        // Add event listener to cancel button
        cancelButton.addEventListener('click', function() {
            modal.classList.add('hidden');
        });

        setTimeout(function(){
            document.getElementById('successMessage').style.display = 'none';
        }, 3000); // 3000 milliseconds = 3 seconds

        setTimeout(function(){
            document.getElementById('errorMessage').style.display = 'none';
        }, 3000); // 3000 milliseconds = 3 seconds

    </script>


</x-app-layout>
