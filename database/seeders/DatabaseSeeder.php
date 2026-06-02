<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Restaurant;
use App\Models\FoodAndBeverage;
use App\Models\Delivery;
use App\Models\DeliveryItem;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // ── Users ──────────────────────────────────────────────────
        $admin = User::factory()->create([
            'name'     => 'Admin User',
            'email'    => 'admin@foodiespot.com',
            'password' => bcrypt('secret123'),
            'role'     => 'admin',
        ]);

        $owner1 = User::factory()->create([
            'name'     => 'Budi Santoso',
            'email'    => 'budi@example.com',
            'password' => bcrypt('secret123'),
        ]);

        $owner2 = User::factory()->create([
            'name'     => 'Siti Rahayu',
            'email'    => 'siti@example.com',
            'password' => bcrypt('secret123'),
        ]);

        $owner3 = User::factory()->create([
            'name'     => 'Andi Wijaya',
            'email'    => 'andi@example.com',
            'password' => bcrypt('secret123'),
        ]);

        $customer1 = User::factory()->create([
            'name'     => 'Test User',
            'email'    => 'test@example.com',
            'password' => bcrypt('secret123'),
        ]);

        $customer2 = User::factory()->create([
            'name'     => 'Dewi Lestari',
            'email'    => 'dewi@example.com',
            'password' => bcrypt('secret123'),
        ]);

        // ── Restaurants ────────────────────────────────────────────
        $r1 = Restaurant::create([
            'user_id'     => $owner1->id,
            'name'        => 'Warung Nusantara',
            'description' => 'Authentic Indonesian cuisine featuring beloved traditional dishes from across the archipelago. From rich rendang to fragrant nasi goreng, every plate tells a story.',
            'address'     => 'Jl. Merdeka No. 12, Bandung',
            'phone'       => '022-1234567',
            'is_active'   => true,
        ]);

        $r2 = Restaurant::create([
            'user_id'     => $owner2->id,
            'name'        => 'Sakura Japanese Kitchen',
            'description' => 'Premium Japanese dining with fresh sushi, ramen, and donburi bowls crafted by experienced chefs using imported ingredients.',
            'address'     => 'Jl. Asia Afrika No. 88, Bandung',
            'phone'       => '022-7654321',
            'is_active'   => true,
        ]);

        $r3 = Restaurant::create([
            'user_id'     => $owner3->id,
            'name'        => 'Pizza Bella Italia',
            'description' => 'Wood-fired pizzas, creamy pastas, and Italian desserts made with love. A taste of Italy right in the heart of Bandung.',
            'address'     => 'Jl. Braga No. 45, Bandung',
            'phone'       => '022-9876543',
            'is_active'   => true,
        ]);

        $r4 = Restaurant::create([
            'user_id'     => $owner1->id,
            'name'        => 'Dapur Sunda',
            'description' => 'Sundanese specialties cooked with traditional methods. Enjoy karedok, sayur asem, and grilled gurame in a cozy atmosphere.',
            'address'     => 'Jl. Dago No. 101, Bandung',
            'phone'       => '022-1112233',
            'is_active'   => true,
        ]);

        $r5 = Restaurant::create([
            'user_id'     => $owner2->id,
            'name'        => 'Seoul Street BBQ',
            'description' => 'Korean BBQ and street food favorites — samgyeopsal, tteokbokki, bibimbap, and more. Grill your own meat at the table!',
            'address'     => 'Jl. Cihampelas No. 77, Bandung',
            'phone'       => '022-4455667',
            'is_active'   => true,
        ]);

        $r6 = Restaurant::create([
            'user_id'     => $owner3->id,
            'name'        => 'The Burger Joint',
            'description' => 'Juicy hand-smashed burgers, crispy fries, and thick milkshakes. American-style comfort food done right.',
            'address'     => 'Jl. Setiabudhi No. 22, Bandung',
            'phone'       => '022-8899001',
            'is_active'   => true,
        ]);

        // ── Food & Beverages ───────────────────────────────────────

        // Warung Nusantara menu
        $f1 = FoodAndBeverage::create([
            'restaurant_id' => $r1->id,
            'name'          => 'Nasi Goreng Spesial',
            'description'   => 'Indonesian fried rice with egg, chicken, prawns, and kerupuk.',
            'price'         => 35000,
            'category'      => 'food',
            'is_available'  => true,
        ]);
        $f2 = FoodAndBeverage::create([
            'restaurant_id' => $r1->id,
            'name'          => 'Rendang Sapi',
            'description'   => 'Slow-cooked beef rendang with rich coconut and spice gravy.',
            'price'         => 55000,
            'category'      => 'food',
            'is_available'  => true,
        ]);
        FoodAndBeverage::create([
            'restaurant_id' => $r1->id,
            'name'          => 'Soto Ayam',
            'description'   => 'Yellow chicken soup with vermicelli, boiled egg, and sambal.',
            'price'         => 30000,
            'category'      => 'food',
            'is_available'  => true,
        ]);
        FoodAndBeverage::create([
            'restaurant_id' => $r1->id,
            'name'          => 'Es Teh Manis',
            'description'   => 'Classic Indonesian sweet iced tea.',
            'price'         => 8000,
            'category'      => 'beverage',
            'is_available'  => true,
        ]);
        FoodAndBeverage::create([
            'restaurant_id' => $r1->id,
            'name'          => 'Jus Alpukat',
            'description'   => 'Creamy avocado juice with chocolate syrup.',
            'price'         => 18000,
            'category'      => 'beverage',
            'is_available'  => true,
        ]);

        // Sakura Japanese Kitchen menu
        $f3 = FoodAndBeverage::create([
            'restaurant_id' => $r2->id,
            'name'          => 'Salmon Sashimi (8 pcs)',
            'description'   => 'Fresh Norwegian salmon sliced to perfection.',
            'price'         => 75000,
            'category'      => 'food',
            'is_available'  => true,
        ]);
        FoodAndBeverage::create([
            'restaurant_id' => $r2->id,
            'name'          => 'Tonkotsu Ramen',
            'description'   => 'Rich pork bone broth ramen with chashu and soft-boiled egg.',
            'price'         => 58000,
            'category'      => 'food',
            'is_available'  => true,
        ]);
        FoodAndBeverage::create([
            'restaurant_id' => $r2->id,
            'name'          => 'Chicken Katsu Don',
            'description'   => 'Crispy breaded chicken cutlet over steamed rice with egg.',
            'price'         => 45000,
            'category'      => 'food',
            'is_available'  => true,
        ]);
        FoodAndBeverage::create([
            'restaurant_id' => $r2->id,
            'name'          => 'Matcha Latte',
            'description'   => 'Premium Japanese matcha with steamed milk.',
            'price'         => 28000,
            'category'      => 'beverage',
            'is_available'  => true,
        ]);

        // Pizza Bella Italia menu
        $f4 = FoodAndBeverage::create([
            'restaurant_id' => $r3->id,
            'name'          => 'Margherita Pizza',
            'description'   => 'Classic wood-fired pizza with San Marzano tomatoes and fresh mozzarella.',
            'price'         => 65000,
            'category'      => 'food',
            'is_available'  => true,
        ]);
        FoodAndBeverage::create([
            'restaurant_id' => $r3->id,
            'name'          => 'Pepperoni Pizza',
            'description'   => 'Loaded with spicy pepperoni and stretchy mozzarella cheese.',
            'price'         => 75000,
            'category'      => 'food',
            'is_available'  => true,
        ]);
        FoodAndBeverage::create([
            'restaurant_id' => $r3->id,
            'name'          => 'Spaghetti Carbonara',
            'description'   => 'Creamy pasta with pancetta, egg yolk, and parmesan.',
            'price'         => 55000,
            'category'      => 'food',
            'is_available'  => true,
        ]);
        FoodAndBeverage::create([
            'restaurant_id' => $r3->id,
            'name'          => 'Tiramisu',
            'description'   => 'Classic Italian dessert with mascarpone and espresso.',
            'price'         => 35000,
            'category'      => 'food',
            'is_available'  => true,
        ]);
        FoodAndBeverage::create([
            'restaurant_id' => $r3->id,
            'name'          => 'Italian Soda',
            'description'   => 'Refreshing sparkling soda with fruit syrup.',
            'price'         => 22000,
            'category'      => 'beverage',
            'is_available'  => true,
        ]);

        // Dapur Sunda menu
        FoodAndBeverage::create([
            'restaurant_id' => $r4->id,
            'name'          => 'Nasi Timbel Komplit',
            'description'   => 'Steamed rice wrapped in banana leaf with fried chicken, tempeh, tofu, and sambal.',
            'price'         => 42000,
            'category'      => 'food',
            'is_available'  => true,
        ]);
        FoodAndBeverage::create([
            'restaurant_id' => $r4->id,
            'name'          => 'Gurame Bakar',
            'description'   => 'Grilled freshwater carp with special Sundanese spice marinade.',
            'price'         => 65000,
            'category'      => 'food',
            'is_available'  => true,
        ]);
        FoodAndBeverage::create([
            'restaurant_id' => $r4->id,
            'name'          => 'Karedok',
            'description'   => 'Fresh raw vegetables with spicy peanut dressing.',
            'price'         => 20000,
            'category'      => 'food',
            'is_available'  => true,
        ]);
        FoodAndBeverage::create([
            'restaurant_id' => $r4->id,
            'name'          => 'Es Cendol',
            'description'   => 'Iced pandan jelly with coconut milk and palm sugar.',
            'price'         => 15000,
            'category'      => 'beverage',
            'is_available'  => true,
        ]);

        // Seoul Street BBQ menu
        FoodAndBeverage::create([
            'restaurant_id' => $r5->id,
            'name'          => 'Samgyeopsal Set',
            'description'   => 'Grilled pork belly with lettuce wraps, kimchi, and ssamjang.',
            'price'         => 89000,
            'category'      => 'food',
            'is_available'  => true,
        ]);
        FoodAndBeverage::create([
            'restaurant_id' => $r5->id,
            'name'          => 'Bibimbap',
            'description'   => 'Mixed rice bowl with vegetables, beef, and gochujang sauce.',
            'price'         => 48000,
            'category'      => 'food',
            'is_available'  => true,
        ]);
        FoodAndBeverage::create([
            'restaurant_id' => $r5->id,
            'name'          => 'Tteokbokki',
            'description'   => 'Spicy stir-fried rice cakes in gochujang sauce.',
            'price'         => 32000,
            'category'      => 'food',
            'is_available'  => true,
        ]);
        FoodAndBeverage::create([
            'restaurant_id' => $r5->id,
            'name'          => 'Soju Yakult',
            'description'   => 'Popular Korean cocktail with soju and Yakult.',
            'price'         => 25000,
            'category'      => 'beverage',
            'is_available'  => true,
        ]);

        // The Burger Joint menu
        FoodAndBeverage::create([
            'restaurant_id' => $r6->id,
            'name'          => 'Classic Smash Burger',
            'description'   => 'Double smashed patties with American cheese, pickles, and special sauce.',
            'price'         => 52000,
            'category'      => 'food',
            'is_available'  => true,
        ]);
        FoodAndBeverage::create([
            'restaurant_id' => $r6->id,
            'name'          => 'BBQ Bacon Burger',
            'description'   => 'Smoked bacon, cheddar, onion rings, and tangy BBQ sauce.',
            'price'         => 62000,
            'category'      => 'food',
            'is_available'  => true,
        ]);
        FoodAndBeverage::create([
            'restaurant_id' => $r6->id,
            'name'          => 'Loaded Cheese Fries',
            'description'   => 'Crispy fries topped with melted cheese, jalapeños, and sour cream.',
            'price'         => 35000,
            'category'      => 'food',
            'is_available'  => true,
        ]);
        FoodAndBeverage::create([
            'restaurant_id' => $r6->id,
            'name'          => 'Oreo Milkshake',
            'description'   => 'Thick and creamy milkshake loaded with Oreo cookies.',
            'price'         => 30000,
            'category'      => 'beverage',
            'is_available'  => true,
        ]);

        // ── Deliveries ─────────────────────────────────────────────

        $d1 = Delivery::create([
            'user_id'          => $customer1->id,
            'restaurant_id'    => $r1->id,
            'delivery_address' => 'Jl. Sukajadi No. 15, Bandung',
            'total_amount'     => 90000,
            'status'           => 'completed',
            'notes'            => 'Extra sambal please!',
        ]);
        DeliveryItem::create([
            'delivery_id'          => $d1->id,
            'food_and_beverage_id' => $f1->id,
            'quantity'             => 1,
            'price'                => 35000,
        ]);
        DeliveryItem::create([
            'delivery_id'          => $d1->id,
            'food_and_beverage_id' => $f2->id,
            'quantity'             => 1,
            'price'                => 55000,
        ]);

        $d2 = Delivery::create([
            'user_id'          => $customer2->id,
            'restaurant_id'    => $r2->id,
            'delivery_address' => 'Jl. Pasteur No. 3, Bandung',
            'total_amount'     => 75000,
            'status'           => 'completed',
            'notes'            => null,
        ]);
        DeliveryItem::create([
            'delivery_id'          => $d2->id,
            'food_and_beverage_id' => $f3->id,
            'quantity'             => 1,
            'price'                => 75000,
        ]);

        $d3 = Delivery::create([
            'user_id'          => $customer1->id,
            'restaurant_id'    => $r3->id,
            'delivery_address' => 'Jl. Sukajadi No. 15, Bandung',
            'total_amount'     => 130000,
            'status'           => 'delivering',
            'notes'            => 'Ring the bell twice.',
        ]);
        DeliveryItem::create([
            'delivery_id'          => $d3->id,
            'food_and_beverage_id' => $f4->id,
            'quantity'             => 2,
            'price'                => 65000,
        ]);

        $d4 = Delivery::create([
            'user_id'          => $customer2->id,
            'restaurant_id'    => $r1->id,
            'delivery_address' => 'Jl. Pasteur No. 3, Bandung',
            'total_amount'     => 55000,
            'status'           => 'confirmed',
            'notes'            => 'No chili.',
        ]);
        DeliveryItem::create([
            'delivery_id'          => $d4->id,
            'food_and_beverage_id' => $f2->id,
            'quantity'             => 1,
            'price'                => 55000,
        ]);

        $d5 = Delivery::create([
            'user_id'          => $customer1->id,
            'restaurant_id'    => $r2->id,
            'delivery_address' => 'Jl. Sukajadi No. 15, Bandung',
            'total_amount'     => 58000,
            'status'           => 'pending',
            'notes'            => null,
        ]);
    }
}
