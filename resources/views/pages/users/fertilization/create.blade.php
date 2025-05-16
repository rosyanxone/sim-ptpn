@extends('layouts.users')

@section('title', 'Add New Product')
@section('header', 'Add New Product')

@section('content')
    <div class="rounded-lg bg-white p-6 shadow-md">
        <div class="mb-6">
            <a class="inline-flex items-center text-sm text-green-600 hover:text-green-800"
                href="#">
                <i class="fas fa-arrow-left mr-2"></i> Back to Products
            </a>
        </div>

        <form action="#" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                <div class="md:col-span-2">
                    <h3 class="mb-4 text-lg font-medium text-gray-900">Product Information</h3>
                </div>

                <!-- Product Name -->
                <div>
                    <label class="mb-1 block text-sm font-medium text-gray-700" for="name">Product Name <span
                            class="text-red-600">*</span></label>
                    <input
                        class="w-full rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500"
                        id="name" name="name" type="text" required>
                    @error('name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- SKU -->
                <div>
                    <label class="mb-1 block text-sm font-medium text-gray-700" for="sku">SKU <span
                            class="text-red-600">*</span></label>
                    <input
                        class="w-full rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500"
                        id="sku" name="sku" type="text" required>
                    @error('sku')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Category -->
                <div>
                    <label class="mb-1 block text-sm font-medium text-gray-700" for="category">Category <span
                            class="text-red-600">*</span></label>
                    <select
                        class="w-full rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500"
                        id="category" name="category" required>
                        <option value="">Select Category</option>
                        <option value="oil-products">Oil Products</option>
                        <option value="biofuel">Biofuel</option>
                        <option value="cooking-oil">Cooking Oil</option>
                    </select>
                    @error('category')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Price -->
                <div>
                    <label class="mb-1 block text-sm font-medium text-gray-700" for="price">Price (per barrel) <span
                            class="text-red-600">*</span></label>
                    <div class="relative">
                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                            <span class="text-gray-500">$</span>
                        </div>
                        <input
                            class="w-full rounded-md border border-gray-300 px-3 py-2 pl-7 focus:outline-none focus:ring-2 focus:ring-green-500"
                            id="price" name="price" type="number" step="0.01" min="0" required>
                    </div>
                    @error('price')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Stock -->
                <div>
                    <label class="mb-1 block text-sm font-medium text-gray-700" for="stock">Stock (barrels) <span
                            class="text-red-600">*</span></label>
                    <input
                        class="w-full rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500"
                        id="stock" name="stock" type="number" min="0" required>
                    @error('stock')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Status -->
                <div>
                    <label class="mb-1 block text-sm font-medium text-gray-700" for="status">Status <span
                            class="text-red-600">*</span></label>
                    <select
                        class="w-full rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500"
                        id="status" name="status" required>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                        <option value="discontinued">Discontinued</option>
                    </select>
                    @error('status')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Product Image -->
                <div class="md:col-span-2">
                    <label class="mb-1 block text-sm font-medium text-gray-700" for="image">Product Image</label>
                    <div class="mt-1 flex items-center">
                        <div
                            class="flex h-32 w-32 items-center justify-center rounded-lg border-2 border-dashed border-gray-300">
                            <img class="hidden h-full w-full rounded-lg object-cover" id="preview" src="#"
                                alt="Preview">
                            <div class="text-center" id="placeholder">
                                <i class="fas fa-image text-3xl text-gray-400"></i>
                                <p class="mt-1 text-xs text-gray-500">Upload Image</p>
                            </div>
                        </div>
                        <input class="hidden" id="image" name="image" type="file" accept="image/*">
                        <button
                            class="ml-5 rounded-md border border-gray-300 bg-white px-3 py-2 text-sm font-medium leading-4 text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2"
                            type="button" onclick="document.getElementById('image').click()">
                            Choose File
                        </button>
                    </div>
                    @error('image')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description -->
                <div class="md:col-span-2">
                    <label class="mb-1 block text-sm font-medium text-gray-700" for="description">Description</label>
                    <textarea
                        class="w-full rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500"
                        id="description" name="description" rows="4"></textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="md:col-span-2">
                    <h3 class="mb-4 text-lg font-medium text-gray-900">Additional Information</h3>
                </div>

                <!-- Certification -->
                <div>
                    <label class="mb-1 block text-sm font-medium text-gray-700" for="certification">Certification</label>
                    <select
                        class="w-full rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500"
                        id="certification" name="certification">
                        <option value="">Select Certification</option>
                        <option value="rspo">RSPO Certified</option>
                        <option value="iscc">ISCC Certified</option>
                        <option value="mspo">MSPO Certified</option>
                        <option value="none">None</option>
                    </select>
                    @error('certification')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Origin -->
                <div>
                    <label class="mb-1 block text-sm font-medium text-gray-700" for="origin">Country of Origin</label>
                    <input
                        class="w-full rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500"
                        id="origin" name="origin" type="text">
                    @error('origin')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Manufacturing Date -->
                <div>
                    <label class="mb-1 block text-sm font-medium text-gray-700" for="manufacturing_date">Manufacturing
                        Date</label>
                    <input
                        class="w-full rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500"
                        id="manufacturing_date" name="manufacturing_date" type="date">
                    @error('manufacturing_date')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Expiry Date -->
                <div>
                    <label class="mb-1 block text-sm font-medium text-gray-700" for="expiry_date">Expiry Date</label>
                    <input
                        class="w-full rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500"
                        id="expiry_date" name="expiry_date" type="date">
                    @error('expiry_date')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Meta Information -->
                <div class="md:col-span-2">
                    <h3 class="mb-4 text-lg font-medium text-gray-900">Meta Information</h3>
                </div>

                <!-- Meta Title -->
                <div>
                    <label class="mb-1 block text-sm font-medium text-gray-700" for="meta_title">Meta Title</label>
                    <input
                        class="w-full rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500"
                        id="meta_title" name="meta_title" type="text">
                    @error('meta_title')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Meta Description -->
                <div>
                    <label class="mb-1 block text-sm font-medium text-gray-700" for="meta_description">Meta
                        Description</label>
                    <textarea
                        class="w-full rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500"
                        id="meta_description" name="meta_description" rows="2"></textarea>
                    @error('meta_description')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Form Actions -->
                <div class="mt-6 flex justify-end space-x-3 md:col-span-2">
                    <button
                        class="rounded-md border border-gray-300 px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2"
                        type="button" onclick="window.location.href='#'">
                        Cancel
                    </button>
                    <button
                        class="rounded-md border border-transparent bg-green-600 px-4 py-2 font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2"
                        type="submit">
                        Save Product
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        // Image preview
        document.getElementById('image').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('preview').src = e.target.result;
                    document.getElementById('preview').classList.remove('hidden');
                    document.getElementById('placeholder').classList.add('hidden');
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
