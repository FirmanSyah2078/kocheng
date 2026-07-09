<x-layout>
   <div class=" flex flex-col gap-5">

     <section class="flex h-full flex-col md:flex-row w-full justify-between items-start md:items-center gap-5">
        <div>
            <h1 class="font-bold text-2xl">Product Catalogue</h1>
            <p class="text-secondary">Explore out pawduct you might like!</p>
        </div>

       <div id="categories-wrapper" class="relative inline-block group">

    <button class="categories flex items-center cursor-pointer border-t border-secondary/10 shadow rounded-2xl py-1.5 px-4 bg-neutral transition-all duration-300 group-[.menu-open]:rounded-b-none">
        Categories
        <span class="icon-[mdi--keyboard-arrow-down] text-xl transition-transform duration-300 ml-2"></span>
    </button>

    <div class="categories-option absolute flex shadow p-4 gap-2 transition-all duration-300 ease-in-out flex-col opacity-0 invisible -translate-y-2 w-full rounded-b-2xl   bg-neutral top-full left-0

    group-[.menu-open]:opacity-100 group-[.menu-open]:visible group-[.menu-open]:translate-y-0
    ">

    <div class="border-b border-secondary/20 py-2">
                <input type="checkbox"> Makanan
            </div>
            <div class="border-b border-secondary/20 py-2">
                <input type="checkbox"> Obat
            </div>
            <div class="border-b border-secondary/20 py-2">
                <input type="checkbox"> Mainan
            </div>
            <div class="py-2 mb-2">
                <input type="checkbox"> Peralatan
            </div>
    </div>

</div>

    </section>

    <section class="h-full grid gap-x-6 gap-6 grid-cols-2 md:grid-cols-4 xl:grid-cols-4 2xl:grid-cols-6 justify-items-start">
    <x-product.product-item
        :images="'https://s7d2.scene7.com/is/image/PetSmart/1221784'"
        :name="'Nyanpasu'"
        :price="'200000'"
        :stock="'2000'"
        :category="'makanan'"
        :id="'1'"
    />
    <x-product.product-item
        :images="'https://thfvnext.bing.com/th/id/OIP.X3hZ8whEmk6JaZW60ZKPBwHaHa?r=0&o=7&cb=thfvnextfalcon4rm=3&rs=1&pid=ImgDetMain&o=7&rm=3'"
        :name="'Nyanpasu'"
        :price="'200000'"
        :stock="'2000'"
        :category="'Peralatan'"
        :id="'2'"
    />
    <x-product.product-item
        :images="'https://images-na.ssl-images-amazon.com/images/I/81iXsuSsv4L.jpg'"
        :name="'Nyanpasu'"
        :price="'200000'"
        :stock="'2000'"
        :category="'Obat'"
        :id="'3'"
    />
    <x-product.product-item
        :images="'https://thfvnext.bing.com/th/id/OIP.SF3zfu7maJ7h_TOEidBvdgHaHa?r=0&o=7&cb=thfvnextfalcon4rm=3&rs=1&pid=ImgDetMain&o=7&rm=3'"
        :name="'Nyanpasu'"
        :price="'200000'"
        :stock="'2000'"
        :category="'Mainan'"
        :id="'4'"
    />
    <x-product.product-item
        :images="'https://s7d2.scene7.com/is/image/PetSmart/1221784'"
        :name="'Nyanpasu'"
        :price="'200000'"
        :stock="'2000'"
        :category="'makanan'"
        :id="'1'"
    />
    <x-product.product-item
        :images="'https://thfvnext.bing.com/th/id/OIP.X3hZ8whEmk6JaZW60ZKPBwHaHa?r=0&o=7&cb=thfvnextfalcon4rm=3&rs=1&pid=ImgDetMain&o=7&rm=3'"
        :name="'Nyanpasu'"
        :price="'200000'"
        :stock="'2000'"
        :category="'Peralatan'"
        :id="'2'"
    />
    <x-product.product-item
        :images="'https://images-na.ssl-images-amazon.com/images/I/81iXsuSsv4L.jpg'"
        :name="'Nyanpasu'"
        :price="'200000'"
        :stock="'2000'"
        :category="'Obat'"
        :id="'3'"
    />
    <x-product.product-item
        :images="'https://thfvnext.bing.com/th/id/OIP.SF3zfu7maJ7h_TOEidBvdgHaHa?r=0&o=7&cb=thfvnextfalcon4rm=3&rs=1&pid=ImgDetMain&o=7&rm=3'"
        :name="'Nyanpasu'"
        :price="'200000'"
        :stock="'2000'"
        :category="'Mainan'"
        :id="'4'"
    />
    <x-product.product-item
        :images="'https://s7d2.scene7.com/is/image/PetSmart/1221784'"
        :name="'Nyanpasu'"
        :price="'200000'"
        :stock="'2000'"
        :category="'makanan'"
        :id="'1'"
    />
    <x-product.product-item
        :images="'https://thfvnext.bing.com/th/id/OIP.X3hZ8whEmk6JaZW60ZKPBwHaHa?r=0&o=7&cb=thfvnextfalcon4rm=3&rs=1&pid=ImgDetMain&o=7&rm=3'"
        :name="'Nyanpasu'"
        :price="'200000'"
        :stock="'2000'"
        :category="'Peralatan'"
        :id="'2'"
    />
    <x-product.product-item
        :images="'https://images-na.ssl-images-amazon.com/images/I/81iXsuSsv4L.jpg'"
        :name="'Nyanpasu'"
        :price="'200000'"
        :stock="'2000'"
        :category="'Obat'"
        :id="'3'"
    />
    <x-product.product-item
        :images="'https://thfvnext.bing.com/th/id/OIP.SF3zfu7maJ7h_TOEidBvdgHaHa?r=0&o=7&cb=thfvnextfalcon4rm=3&rs=1&pid=ImgDetMain&o=7&rm=3'"
        :name="'Nyanpasu'"
        :price="'200000'"
        :stock="'2000'"
        :category="'Mainan'"
        :id="'4'"
    />
    <x-product.product-item
        :images="'https://thfvnext.bing.com/th/id/OIP.X3hZ8whEmk6JaZW60ZKPBwHaHa?r=0&o=7&cb=thfvnextfalcon4rm=3&rs=1&pid=ImgDetMain&o=7&rm=3'"
        :name="'Nyanpasu'"
        :price="'200000'"
        :stock="'2000'"
        :category="'Peralatan'"
        :id="'2'"
    />
    <x-product.product-item
        :images="'https://images-na.ssl-images-amazon.com/images/I/81iXsuSsv4L.jpg'"
        :name="'Nyanpasu'"
        :price="'200000'"
        :stock="'2000'"
        :category="'Obat'"
        :id="'3'"
    />
    <x-product.product-item
        :images="'https://thfvnext.bing.com/th/id/OIP.SF3zfu7maJ7h_TOEidBvdgHaHa?r=0&o=7&cb=thfvnextfalcon4rm=3&rs=1&pid=ImgDetMain&o=7&rm=3'"
        :name="'Nyanpasu'"
        :price="'200000'"
        :stock="'2000'"
        :category="'Mainan'"
        :id="'4'"
    />
    </section>
   </div>

</x-layout>