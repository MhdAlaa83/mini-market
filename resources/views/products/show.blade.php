@extends('layouts.app')

@section('content')
<div class="row g-4">
  <div class="col-md-5">
    <div class="card p-3 h-100">
      <div class="ratio ratio-16x9 bg-light d-flex align-items-center justify-content-center rounded overflow-hidden">
        <img src="{{ $product->image_web_url }}"
             class="w-100 h-100 object-fit-contain p-3"
             alt="{{ $product->name }}">
      </div>
    </div>
  </div>
  <div class="col-md-7">
    <div class="card p-4 h-100">
      <h1 class="h3 mb-1">{{ $product->name }}</h1>
      <p class="mb-2">
        <span class="badge {{ $product->category_color_class }}">
    {{ $product->category ?? 'Uncategorized' }}
  </span>
</p>

      <p class="lead fw-semibold">$ {{ number_format($product->price,2) }}</p>
      <p class="text-muted">{{ $product->description }}</p>

      <div class="mt-3">
        <span class="me-3">Stock: <strong>{{ $product->stock }}</strong></span>
        <span>Status: <strong>{{ $product->is_active ? 'Active' : 'Inactive' }}</strong></span>
      </div>

      <div class="mt-4 d-flex gap-2">
        <a href="{{ route('products.edit', $product) }}" class="btn btn-outline-secondary">Edit</a>
        <a href="{{ route('products.index') }}" class="btn btn-soft">Back</a>
      </div>
    </div>
  </div>
</div>
@endsection
