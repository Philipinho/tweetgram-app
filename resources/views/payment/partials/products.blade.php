<div style="display: none;">
    <select class="form-control" id="product_list" name="product_list">
        <option value="">Choose product</option>
        @foreach($products as $product)

            <option id="{{ $product->plan_id }}" value="{{ $product->paddle_product_id }}"> {{ $product->product_name }} </option>

        @endforeach
    </select>
</div>
