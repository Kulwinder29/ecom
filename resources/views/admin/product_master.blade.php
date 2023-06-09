@extends('admin.main')
@section('container')
    <div style="padding:1rem;" class="border-b">
        <h2 class="text-purple-600">Product Master</h2>
    </div>
    <main class="h-full overflow-y-auto ">
        <form action="{{ route('product.insert') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800 m-3">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Product Name</span>
                    <input name="product_name"
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        placeholder="Product Name">
                </label>

                <label class="block text-sm my-2">
                    <span class="text-gray-700 dark:text-gray-400 ">Product Image</span>
                    <input type="file" name="product_image"
                        class="block w-full text-sm text-slate-500
                    file:mr-4 file:py-2 file:px-4
                    file:rounded-full file:border-0
                    file:text-sm file:font-semibold
                    file:bg-violet-50 file:text-violet-700
                    hover:file:bg-violet-100
                  " />
                </label>
                <div class="flex mt-6 text-sm">
                    <label class="flex items-center dark:text-gray-400">
                        <input type="checkbox" name="best_seller"
                            class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                        <span class="ml-2">
                            Best Seller
                        </span>
                    </label>
                </div>
                <div class="block text-sm">
                    <div class="flex justify-between gap-4">
                        <div style="margin:1rem 0;" class="w-full">
                            <span class="text-gray-700 dark:text-gray-400">CATEGORY</span>
                            <select id="category" name="category_id"
                                class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                                <option value="0">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div style="margin:1rem 0;" class="w-full">
                            <span class="text-gray-700 dark:text-gray-400">SUB CATEGORY</span>
                            <select name="sub_category_id" id="subcategory"
                                class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                                <option value="">Select Sub Category</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="block text-sm" id="add_section">
                    <br>
                    <span class="text-gray-700 dark:text-gray-400">Product Attribute</span>
                    <div class="flex justify-between">
                        <div style="margin:1rem 0;">
                            <span class="text-gray-700 dark:text-gray-400">MRP</span>
                            <input name="mrp[]"
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                placeholder="MRP" type="number">
                        </div>
                        <div style="margin:1rem 0;">
                            <span class="text-gray-700 dark:text-gray-400">PRICE</span>
                            <input name="price[]"
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                placeholder="PRICE" type="number">
                        </div>
                        <div style="margin:1rem 0;">
                            <span class="text-gray-700 dark:text-gray-400">COLOR</span>
                            <select name="color[]"
                                class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                                <option value="red">Select Color</option>
                                @foreach ($colors as $color)
                                    <option value="{{ $color->id }}">{{ $color->color }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div style="margin:1rem 0;">
                            <span class="text-gray-700 dark:text-gray-400">SIZE</span>
                            <select name="size[]"
                                class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                                <option value="s">Select Size</option>
                                @foreach ($size as $size_list)
                                    <option value="{{ $size_list->id }}">{{ $size_list->size }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div style="margin:1rem 0;">
                            <span class="text-gray-700 dark:text-gray-400">MORE</span>
                            <button type="button" id="add_more"
                                class="block w-full mt-1 hover:bg-purple-600 text-white font-bold py-2 px-4 rounded bg-purple-400 ">ADD
                                MORE</button>
                        </div>
                        <div style="margin:1rem 0;">
                            <span class="text-gray-700 dark:text-gray-400">REMOVE</span>
                            <button type="button" id="remove"
                                class="block w-full mt-1 hover:bg-purple-600 text-white font-bold py-2 px-4 rounded bg-purple-400">REMOVE</button>
                        </div>

                    </div>
                </div>

                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Product Description</span>
                    <textarea name="product_description"
                        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                        rows="3" placeholder="Enter some long form content."></textarea>
                </label>
                <div style="margin:1rem 0;">
                    <span class="text-gray-700 dark:text-gray-400">Product Status</span>
                    <select name="product_status"
                        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                        <option value="1">Active</option>
                        <option value="0">Deactive</option>
                    </select>
                </div>
                <div class="block mt-4 text-sm flex justify-center">
                    <button class="block  mt-1 hover:bg-purple-600 text-white font-bold py-2 px-4 rounded bg-purple-400 "
                        type="submit">Product Publish</button>
                </div>
            </div>
        </form>
    </main>

    <script>
        $(document).ready(function() {
            $('#category').change(function() {
                let c_id = $(this).val();
                $.ajax({
                    url: "{{ route('getCategory') }}",
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    type: 'post',
                    data: {
                        c_id: c_id
                    },
                    success: function(response) {
                        $('#subcategory').html(response);
                        // console.log(response);
                    },
                })
            })
            $('#add_more').click(function() {
                // alert('add');

                let html =
                    '<div class="flex justify-between"><div style="margin:1rem 0;"><span class="text-gray-700 dark:text-gray-400">MRP</span><input name="mrp[]" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple placeholder="MRP" type="number"></div><div style="margin:1rem 0;"><span class="text-gray-700 dark:text-gray-400">PRICE</span><input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="PRICE" type="number"></div><div style="margin:1rem 0;"><span class="text-gray-700 dark:text-gray-400">COLOR</span><select name="color[]" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"><option value="red">Select Color</option> @foreach ($colors as $color)<option value="{{ $color->id }}">{{ $color->color }}</option> @endforeach </select></div><div style="margin:1rem 0;"><span class="text-gray-700 dark:text-gray-400">SIZE</span><select name="size[]" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"><option value="s">Select Size</option> @foreach ($size as $size_list) <option value="{{ $size_list->id }}">{{ $size_list->size }}</option> @endforeach </select></div><div style="margin:1rem 0;"></div><div style="margin:1rem 0;"><span class="text-gray-700 dark:text-gray-400">REMOVE</span><button type="button" id="remove" class="block w-full mt-1 hover:bg-purple-600 text-white font-bold py-2 px-4 rounded bg-purple-400">REMOVE</button></div></div>';

                $("#add_section").append(html);
            });
            $('#remove').click(function() {
                // alert('remove');
                $("#add_section").empty();
            });
        })
    </script>
@endsection
