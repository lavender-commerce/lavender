<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Migration1435514563 extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		
        Schema::create("account_admin", function (Blueprint $table){

            $table->engine = 'InnoDB';

            $table->increments('id');

            $table->string("email", 150)->unique();
			$table->string("password", 150)->default("")->nullable();
			$table->string("remember_token", 150)->default("")->nullable();
			$table->timestamps();

        });

        Schema::create("cart", function (Blueprint $table){

            $table->engine = 'InnoDB';

            $table->increments('id');

            $table->integer("customer_id")->unsigned()->nullable();$table->index("customer_id");
			$table->string("status", 150)->default("open")->nullable();
			$table->integer("store_id")->unsigned()->nullable();$table->index("store_id");
			$table->timestamps();

        });

        Schema::create("cart_item", function (Blueprint $table){

            $table->engine = 'InnoDB';

            $table->increments('id');

            $table->integer("cart_id")->unsigned()->nullable();$table->index("cart_id");
			$table->integer("product_id")->unsigned()->nullable();$table->index("product_id");
			$table->integer("qty")->nullable();
			$table->decimal("total", 12, 4)->nullable();
			$table->integer("store_id")->unsigned()->nullable();$table->index("store_id");

        });

        Schema::create("cart_shipment", function (Blueprint $table){

            $table->engine = 'InnoDB';

            $table->increments('id');

            $table->integer("cart_id")->unsigned()->nullable();$table->index("cart_id");
			$table->integer("customer_address_id")->unsigned()->nullable();$table->index("customer_address_id");
			$table->string("method", 150)->default("")->nullable();
			$table->integer("number")->nullable();
			$table->decimal("total", 12, 4)->nullable();

        });

        Schema::create("cart_payment", function (Blueprint $table){

            $table->engine = 'InnoDB';

            $table->increments('id');

            $table->integer("cart_id")->unsigned()->nullable();$table->index("cart_id");
			$table->integer("customer_address_id")->unsigned()->nullable();$table->index("customer_address_id");
			$table->string("method", 150)->default("")->nullable();
			$table->integer("number")->nullable();
			$table->decimal("total", 12, 4)->nullable();

        });

        Schema::create("catalog_category", function (Blueprint $table){

            $table->engine = 'InnoDB';

            $table->increments('id');

            $table->integer("category_id")->unsigned()->nullable();$table->index("category_id");
			$table->string("name", 150)->default("")->nullable();
			$table->longText("description")->nullable();
			$table->string("url", 150)->default("")->nullable();
			$table->timestamps();

        });

        Schema::create("account_customer", function (Blueprint $table){

            $table->engine = 'InnoDB';

            $table->increments('id');

            $table->integer("customer_address_id")->unsigned()->nullable();$table->index("customer_address_id");
			$table->string("email", 150)->default("")->nullable();
			$table->string("password", 150)->default("")->nullable();
			$table->string("confirmation_code", 150)->default("")->nullable();
			$table->string("remember_token", 150)->default("")->nullable();
			$table->integer("confirmed")->nullable();
			$table->integer("store_id")->unsigned()->nullable();$table->index("store_id");
			$table->timestamps();

        });

        Schema::create("account_customer_address", function (Blueprint $table){

            $table->engine = 'InnoDB';

            $table->increments('id');

            $table->integer("customer_id")->unsigned()->nullable();$table->index("customer_id");
			$table->string("name", 150)->default("")->nullable();
			$table->string("street_1", 150)->default("")->nullable();
			$table->string("street_2", 150)->default("")->nullable();
			$table->string("city", 150)->default("")->nullable();
			$table->string("region", 150)->default("")->nullable();
			$table->string("country", 150)->default("")->nullable();
			$table->string("postcode", 150)->default("")->nullable();
			$table->string("phone", 150)->default("")->nullable();
			$table->timestamps();

        });

        Schema::create("catalog_product", function (Blueprint $table){

            $table->engine = 'InnoDB';

            $table->increments('id');

            $table->string("sku", 150)->default("")->nullable();
			$table->string("name", 150)->default("")->nullable();
			$table->decimal("price", 12, 4)->nullable();
			$table->string("url", 150)->default("")->nullable();
			$table->decimal("special_price", 12, 4)->nullable();
			$table->integer("store_id")->unsigned()->nullable();$table->index("store_id");
			$table->timestamps();

        });

        Schema::create("account_password_reminders", function (Blueprint $table){

            $table->engine = 'InnoDB';

            $table->increments('id');

            $table->string("email", 150)->default("")->nullable();
			$table->string("token", 150)->default("")->nullable();
			$table->string("created_at", 150)->default("")->nullable();
			$table->integer("store_id")->unsigned()->nullable();$table->index("store_id");

        });

        Schema::create("store", function (Blueprint $table){

            $table->engine = 'InnoDB';

            $table->increments('id');

            $table->integer("category_id")->unsigned()->nullable();$table->index("category_id");
			$table->integer("theme_id")->unsigned()->nullable();$table->index("theme_id");
			$table->integer("default")->nullable();

        });

        Schema::create("store_config", function (Blueprint $table){

            $table->engine = 'InnoDB';

            $table->increments('id');

            $table->integer("store_id")->unsigned()->nullable();$table->index("store_id");
			$table->string("key", 150)->default("")->nullable();
			$table->string("value", 150)->default("")->nullable();

        });

        Schema::create("theme", function (Blueprint $table){

            $table->engine = 'InnoDB';

            $table->increments('id');

            $table->integer("theme_id")->unsigned()->nullable();$table->index("theme_id");
			$table->string("code", 150)->unique();
			$table->string("name", 150)->default("")->nullable();

        });

        Schema::create("catalog_category_product", function (Blueprint $table){

            $table->engine = 'InnoDB';

            $table->increments('id');

            $table->integer("product_id")->unsigned()->nullable();$table->index("product_id");
			$table->integer("category_id")->unsigned()->nullable();$table->index("category_id");

        });

        Schema::table("cart", function (Blueprint $table){

            

            $table->foreign("customer_id")
                ->references("id")
                ->on("account_customer")
                ->onDelete("cascade");
			$table->foreign("store_id")
                ->references("id")
                ->on("store")
                ->onDelete("cascade");

        });

        Schema::table("cart_item", function (Blueprint $table){

            

            $table->foreign("cart_id")
                ->references("id")
                ->on("cart")
                ->onDelete("cascade");
			$table->foreign("product_id")
                ->references("id")
                ->on("catalog_product")
                ->onDelete("cascade");
			$table->foreign("store_id")
                ->references("id")
                ->on("store")
                ->onDelete("cascade");

        });

        Schema::table("cart_shipment", function (Blueprint $table){

            

            $table->foreign("cart_id")
                ->references("id")
                ->on("cart")
                ->onDelete("cascade");
			$table->foreign("customer_address_id")
                ->references("id")
                ->on("account_customer_address")
                ->onDelete("cascade");

        });

        Schema::table("cart_payment", function (Blueprint $table){

            

            $table->foreign("cart_id")
                ->references("id")
                ->on("cart")
                ->onDelete("cascade");
			$table->foreign("customer_address_id")
                ->references("id")
                ->on("account_customer_address")
                ->onDelete("cascade");

        });

        Schema::table("catalog_category", function (Blueprint $table){

            

            $table->foreign("category_id")
                ->references("id")
                ->on("catalog_category")
                ->onDelete("cascade");

        });

        Schema::table("account_customer", function (Blueprint $table){

            

            $table->foreign("customer_address_id")
                ->references("id")
                ->on("account_customer_address")
                ->onDelete("cascade");
			$table->foreign("store_id")
                ->references("id")
                ->on("store")
                ->onDelete("cascade");

        });

        Schema::table("account_customer_address", function (Blueprint $table){

            

            $table->foreign("customer_id")
                ->references("id")
                ->on("account_customer")
                ->onDelete("cascade");

        });

        Schema::table("catalog_product", function (Blueprint $table){

            

            $table->foreign("store_id")
                ->references("id")
                ->on("store")
                ->onDelete("cascade");

        });

        Schema::table("account_password_reminders", function (Blueprint $table){

            

            $table->foreign("store_id")
                ->references("id")
                ->on("store")
                ->onDelete("cascade");

        });

        Schema::table("store", function (Blueprint $table){

            

            $table->foreign("category_id")
                ->references("id")
                ->on("catalog_category")
                ->onDelete("cascade");
			$table->foreign("theme_id")
                ->references("id")
                ->on("theme")
                ->onDelete("cascade");

        });

        Schema::table("store_config", function (Blueprint $table){

            

            $table->foreign("store_id")
                ->references("id")
                ->on("store")
                ->onDelete("cascade");

        });

        Schema::table("theme", function (Blueprint $table){

            

            $table->foreign("theme_id")
                ->references("id")
                ->on("theme")
                ->onDelete("cascade");

        });

        Schema::table("catalog_category_product", function (Blueprint $table){

            

            $table->foreign("product_id")
                ->references("id")
                ->on("catalog_product")
                ->onDelete("cascade");
			$table->foreign("category_id")
                ->references("id")
                ->on("catalog_category")
                ->onDelete("cascade");

        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		
        Schema::table("catalog_category_product", function (Blueprint $table){

            $table->dropForeign("catalog_category_product_product_id_foreign");
			$table->dropForeign("catalog_category_product_category_id_foreign");

            

        });

        Schema::table("theme", function (Blueprint $table){

            $table->dropForeign("theme_theme_id_foreign");

            

        });

        Schema::table("store_config", function (Blueprint $table){

            $table->dropForeign("store_config_store_id_foreign");

            

        });

        Schema::table("store", function (Blueprint $table){

            $table->dropForeign("store_category_id_foreign");
			$table->dropForeign("store_theme_id_foreign");

            

        });

        Schema::table("account_password_reminders", function (Blueprint $table){

            $table->dropForeign("account_password_reminders_store_id_foreign");

            

        });

        Schema::table("catalog_product", function (Blueprint $table){

            $table->dropForeign("catalog_product_store_id_foreign");

            

        });

        Schema::table("account_customer_address", function (Blueprint $table){

            $table->dropForeign("account_customer_address_customer_id_foreign");

            

        });

        Schema::table("account_customer", function (Blueprint $table){

            $table->dropForeign("account_customer_customer_address_id_foreign");
			$table->dropForeign("account_customer_store_id_foreign");

            

        });

        Schema::table("catalog_category", function (Blueprint $table){

            $table->dropForeign("catalog_category_category_id_foreign");

            

        });

        Schema::table("cart_payment", function (Blueprint $table){

            $table->dropForeign("cart_payment_cart_id_foreign");
			$table->dropForeign("cart_payment_customer_address_id_foreign");

            

        });

        Schema::table("cart_shipment", function (Blueprint $table){

            $table->dropForeign("cart_shipment_cart_id_foreign");
			$table->dropForeign("cart_shipment_customer_address_id_foreign");

            

        });

        Schema::table("cart_item", function (Blueprint $table){

            $table->dropForeign("cart_item_cart_id_foreign");
			$table->dropForeign("cart_item_product_id_foreign");
			$table->dropForeign("cart_item_store_id_foreign");

            

        });

        Schema::table("cart", function (Blueprint $table){

            $table->dropForeign("cart_customer_id_foreign");
			$table->dropForeign("cart_store_id_foreign");

            

        });

        Schema::drop("catalog_category_product");

        Schema::drop("theme");

        Schema::drop("store_config");

        Schema::drop("store");

        Schema::drop("account_password_reminders");

        Schema::drop("catalog_product");

        Schema::drop("account_customer_address");

        Schema::drop("account_customer");

        Schema::drop("catalog_category");

        Schema::drop("cart_payment");

        Schema::drop("cart_shipment");

        Schema::drop("cart_item");

        Schema::drop("cart");

        Schema::drop("account_admin");
	}

}
