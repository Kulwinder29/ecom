@extends('admin.main')
@section('container')
<div style="padding:1rem;" class="border-b">
  <h2 class="text-purple-600">Category Master</h2>
</div>

<form action="{{route('category.store')}}" method="post">
    @csrf
<div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
    <label class="block text-sm">
      <span class="text-gray-700 dark:text-gray-400">Category Name</span>
      <input name="name" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Category Add">
    </label>
</div>

<div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
    <label class="block text-sm">
      <span class="text-purple-600">Sub Category of</span>
      <select class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" name="category_id" id="" >
        <option value="">No Subcategory</option>
        @foreach ($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
      </select>
    </label>
</div>
<div class="flex justify-center">
<input class="flex items-center justify-between w-40 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" name="submit" type="submit" value="Submit">
</div>
</form>
@endsection