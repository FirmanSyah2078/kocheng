 <div id="cart-wrapper" class="relative inline-block group ">

     <x-nav-link href="{{ route('cart') }}" :active="request()->routeIs('cart')">

         <div class="flex items-center justify-center">
             <span
                 class="cart-icon text-2xl group-[.menu-open]:text-primary  hover:text-primary transition-all duration-250 group-[.menu-open]:scale-120 icon-[solar--cart-3-bold]">
             </span>
         </div>

     </x-nav-link>


     @php
         $cart = session('cart', []);

         $products = \App\Models\Product::whereIn('id', array_keys($cart))->get();
         $totalUniqueProducts = $products->count();
     @endphp

     <div
         class="cart-modal absolute z-10 right-0 h-fit w-100 bg-neutral shadow border-t-2 border-t-secondary/10 text-black  px-4 py-4 rounded-tl-2xl rounded-bl-2xl rounded-br-2xl text-xs opacity-0 invisible -translate-y-2
        transition-all duration-250 ease-in-out
        group-[.menu-open]:opacity-100 group-[.menu-open]:visible group-[.menu-open]:translate-y-0
        ">
         <div class="flex flex-col gap-2 border-b-2 border-b-secondary/10 pb-2">
             @if ($totalUniqueProducts > 0)
                 @foreach ($products->take(3) as $product)
                     <x-cart.cart-item-hover :name="$product->name" :price="$product->formatted_price" :image="$product->image" />
                 @endforeach
                 @if ($totalUniqueProducts > 3)
                     <p class="text-center text-secondary italic py-1">
                         ...and {{ $totalUniqueProducts - 3 }} more items
                     </p>
                 @endif
             @else
                 <p class="text-center text-secondary">Your cart is empty</p>
             @endif
         </div>

         <div class="mt-3 text-secondary px-2 flex flex-row justify-between items-center">
             <p>{{ $totalUniqueProducts }} Pawducts In Cart</p>
             <button>
                 <a href="{{ route('cart') }}"
                     class="bg-primary  text-white py-1 px-2 mt-2 rounded-lg hover:bg-primary-dark transition">
                     View Cart
                 </a>
             </button>
         </div>

     </div>

 </div>
