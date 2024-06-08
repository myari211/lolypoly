<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Ramsey\Uuid\Uuid as Generator;
use Illuminate\Support\Carbon;

class CreateIconsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('00_icon', function (Blueprint $table) {
            $table->string('id', 40)->primary()->index();
            $table->string('name');
            $table->string('class');
            $table->string('created_by', 40);
            $table->string('updated_by', 40);
            $table->timestamps();
            $table->softDeletes();
        });

        DB::table('00_icon')->insert([
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-500px',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-address-book',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-address-book-o',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-address-card',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-address-card-o',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-adjust',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-adn',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-align-center',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-align-justify',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-align-left',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-align-right',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-amazon',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-ambulance',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-american-sign-language-interpreting',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-anchor',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-android',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-angellist',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-angle-double-down',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-angle-double-left',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-angle-double-right',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-angle-double-up',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-angle-down',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-angle-left',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-angle-right',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-angle-up',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-apple',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-archive',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-area-chart',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-arrow-circle-down',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-arrow-circle-left',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-arrow-circle-o-down',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-arrow-circle-o-left',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-arrow-circle-o-right',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-arrow-circle-o-up',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-arrow-circle-right',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-arrow-circle-up',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-arrow-down',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-arrow-left',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-arrow-right',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-arrow-up',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-arrows',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-arrows-alt',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-arrows-h',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-arrows-v',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-asl-interpreting',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-assistive-listening-systems',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-asterisk',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-at',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-audio-description',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-automobile',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-backward',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-balance-scale',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-ban',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-bandcamp',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-bank',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-bar-chart',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-bar-chart-o',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-barcode',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-bars',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-bath',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-bathtub',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-battery',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-battery-0',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-battery-1',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-battery-2',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-battery-3',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-battery-4',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-battery-empty',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-battery-full',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-battery-half',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-battery-quarter',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-battery-three-quarters',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-bed',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-beer',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-behance',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-behance-square',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-bell',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-bell-o',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-bell-slash',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-bell-slash-o',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-bicycle',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-binoculars',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-birthday-cake',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-bitbucket',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-bitbucket-square',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-bitcoin',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-black-tie',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-blind',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-bluetooth',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-bluetooth-b',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-bold',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-bolt',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-bomb',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-book',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-bookmark',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-bookmark-o',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-braille',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-briefcase',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-btc',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-bug',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-building',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-building-o',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-bullhorn',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-bullseye',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-bus',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-buysellads',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-cab',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-calculator',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-calendar',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-calendar-check-o',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-calendar-minus-o',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-calendar-o',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-calendar-plus-o',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-calendar-times-o',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-camera',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-camera-retro',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-car',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-caret-down',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-caret-left',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-caret-right',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-caret-square-o-down',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-caret-square-o-left',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-caret-square-o-right',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-caret-square-o-up',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-caret-up',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-cart-arrow-down',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-cart-plus',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-cc',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-cc-amex',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-cc-diners-club',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-cc-discover',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-cc-jcb',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-cc-mastercard',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-cc-paypal',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-cc-stripe',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-cc-visa',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-certificate',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-chain',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-chain-broken',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-check',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-check-circle',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-check-circle-o',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-check-square',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-check-square-o',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-chevron-circle-down',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-chevron-circle-left',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-chevron-circle-right',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-chevron-circle-up',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-chevron-down',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-chevron-left',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-chevron-right',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-chevron-up',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-child',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-chrome',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-circle',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-circle-o',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-circle-o-notch',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-circle-thin',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-clipboard',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-clock-o',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-clone',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-close',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-cloud',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-cloud-download',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-cloud-upload',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-cny',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-code',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-code-fork',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-codepen',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-codiepie',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-coffee',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-cog',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-cogs',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-columns',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-comment',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-comment-o',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-commenting',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-commenting-o',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-comments',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-comments-o',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-compass',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-compress',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-connectdevelop',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-contao',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-copy',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-copyright',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-creative-commons',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-credit-card',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-credit-card-alt',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-crop',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-crosshairs',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-css3',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-cube',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-cubes',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-cut',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-cutlery',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-dashboard',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-dashcube',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-database',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-deaf',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-deafness',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-dedent',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-delicious',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-desktop',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-deviantart',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-diamond',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-digg',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-dollar',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-dot-circle-o',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-download',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-dribbble',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-drivers-license',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-drivers-license-o',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-dropbox',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-drupal',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-edge',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-edit',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-eercast',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-eject',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-ellipsis-h',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-ellipsis-v',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-empire',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-envelope',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-envelope-o',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-envelope-open',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-envelope-open-o',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-envelope-square',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-envira',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-eraser',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-etsy',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-eur',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-euro',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-exchange',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-exclamation',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-exclamation-circle',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-exclamation-triangle',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-expand',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-expeditedssl',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-external-link',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-external-link-square',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-eye',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-eye-slash',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-eyedropper',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-fa',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-facebook',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-facebook-f',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-facebook-official',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-facebook-square',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-fast-backward',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-fast-forward',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-fax',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-feed',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-female',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-fighter-jet',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-file',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-file-archive-o',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-file-audio-o',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-file-code-o',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-file-excel-o',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-file-image-o',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-file-movie-o',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-file-o',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-file-pdf-o',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-file-photo-o',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-file-picture-o',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-file-powerpoint-o',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-file-sound-o',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-file-text',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-file-text-o',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-file-video-o',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-file-word-o',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-file-zip-o',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-files-o',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-film',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-filter',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-fire',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-fire-extinguisher',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-firefox',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-first-order',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-flag',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-flag-checkered',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-flag-o',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-flash',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-flask',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-flickr',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-floppy-o',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-folder',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-folder-o',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-folder-open',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-folder-open-o',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-font',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-font-awesome',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-fonticons',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-fort-awesome',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-forumbee',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-forward',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-foursquare',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-free-code-camp',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-frown-o',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-futbol-o',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-gamepad',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-gavel',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-gbp',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-ge',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-gear',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-gears',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-genderless',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-get-pocket',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-gg',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-gg-circle',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-gift',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-git',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-git-square',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-github',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-github-alt',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-github-square',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-gitlab',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-gittip',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-glass',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-glide',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-glide-g',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-globe',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-google',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-google-plus',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-google-plus-circle',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-google-plus-official',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-google-plus-square',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-google-wallet',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-graduation-cap',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-gratipay',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-grav',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-group',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-h-square',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-hacker-news',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-hand-grab-o',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-hand-lizard-o',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-hand-o-down',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-hand-o-left',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-hand-o-right',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-hand-o-up',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-hand-paper-o',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-hand-peace-o',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-hand-pointer-o',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-hand-rock-o',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-hand-scissors-o',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-hand-spock-o',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-hand-stop-o',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-handshake-o',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-hard-of-hearing',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-hashtag',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-hdd-o',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-header',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-headphones',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-heart',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-heart-o',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-heartbeat',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-history',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-home',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-hospital-o',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-hotel',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-hourglass',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-hourglass-1',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-hourglass-2',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-hourglass-3',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-hourglass-end',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-hourglass-half',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-hourglass-o',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-hourglass-start',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-houzz',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-html5',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-i-cursor',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-id-badge',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-id-card',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-id-card-o',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-ils',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-image',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-imdb',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-inbox',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-indent',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-industry',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-info',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-info-circle',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-inr',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-instagram',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-institution',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-internet-explorer',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-intersex',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-ioxhost',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-italic',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-joomla',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-jpy',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-jsfiddle',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-key',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-keyboard-o',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-krw',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-language',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-laptop',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-lastfm',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-lastfm-square',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-leaf',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-leanpub',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-legal',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-lemon-o',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-level-down',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-level-up',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-life-bouy',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-life-buoy',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-life-ring',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-life-saver',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-lightbulb-o',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-line-chart',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-link',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-linkedin',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-linkedin-square',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-linode',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-linux',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-list',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-list-alt',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-list-ol',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-list-ul',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-location-arrow',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-lock',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-long-arrow-down',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-long-arrow-left',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-long-arrow-right',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-long-arrow-up',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-low-vision',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-magic',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-magnet',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-mail-forward',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-mail-reply',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-mail-reply-all',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-male',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-map',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-map-marker',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-map-o',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-map-pin',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-map-signs',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-mars',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-mars-double',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-mars-stroke',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-mars-stroke-h',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-mars-stroke-v',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-maxcdn',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-meanpath',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-medium',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-medkit',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-meetup',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-meh-o',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-mercury',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-microchip',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-microphone',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-microphone-slash',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-minus',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-minus-circle',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-minus-square',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-minus-square-o',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-mixcloud',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-mobile',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-mobile-phone',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-modx',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-money',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-moon-o',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-mortar-board',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-motorcycle',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-mouse-pointer',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-music',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-navicon',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-neuter',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-newspaper-o',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-object-group',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-object-ungroup',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-odnoklassniki',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-odnoklassniki-square',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-opencart',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-openid',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-opera',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-optin-monster',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-outdent',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-pagelines',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-paint-brush',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-paper-plane',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-paper-plane-o',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-paperclip',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-paragraph',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-paste',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-pause',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-pause-circle',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-pause-circle-o',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-paw',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-paypal',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-pencil',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-pencil-square',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-pencil-square-o',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-percent',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-phone',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-phone-square',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-photo',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-picture-o',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-pie-chart',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-pied-piper',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-pied-piper-alt',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-pied-piper-pp',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-pinterest',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-pinterest-p',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-pinterest-square',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-plane',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-play',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-play-circle',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-play-circle-o',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-plug',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-plus',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-plus-circle',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-plus-square',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-plus-square-o',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-podcast',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-power-off',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-print',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-product-hunt',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-puzzle-piece',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-qq',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-qrcode',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-question',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-question-circle',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-question-circle-o',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-quora',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-quote-left',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-quote-right',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-ra',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-random',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-ravelry',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-rebel',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-recycle',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-reddit',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-reddit-alien',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-reddit-square',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-refresh',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-registered',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-remove',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-renren',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-reorder',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-repeat',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-reply',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-reply-all',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-resistance',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-retweet',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-rmb',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-road',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-rocket',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-rotate-left',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-rotate-right',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-rouble',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-rss',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-rss-square',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-rub',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-ruble',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-rupee',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-s15',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-safari',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-save',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-scissors',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-scribd',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-search',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-search-minus',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-search-plus',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-sellsy',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-send',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-send-o',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-server',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-share',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-share-alt',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-share-alt-square',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-share-square',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-share-square-o',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-shekel',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-sheqel',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-shield',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-ship',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-shirtsinbulk',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-shopping-bag',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-shopping-basket',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-shopping-cart',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-shower',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-sign-in',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-sign-language',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-sign-out',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-signal',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-signing',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-simplybuilt',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-sitemap',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-skyatlas',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-skype',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-slack',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-sliders',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-slideshare',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-smile-o',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-snapchat',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-snapchat-ghost',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-snapchat-square',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-snowflake-o',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-soccer-ball-o',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-sort',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-sort-alpha-asc',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-sort-alpha-desc',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-sort-amount-asc',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-sort-amount-desc',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-sort-asc',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-sort-desc',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-sort-down',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-sort-numeric-asc',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-sort-numeric-desc',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-sort-up',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-soundcloud',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-space-shuttle',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-spinner',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-spoon',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-spotify',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-square',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-square-o',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-stack-exchange',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-stack-overflow',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-star',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-star-half',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-star-half-empty',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-star-half-full',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-star-half-o',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-star-o',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-steam',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-steam-square',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-step-backward',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-step-forward',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-stethoscope',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-sticky-note',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-sticky-note-o',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-stop',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-stop-circle',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-stop-circle-o',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-street-view',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-strikethrough',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-stumbleupon',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-stumbleupon-circle',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-subscript',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-subway',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-suitcase',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-sun-o',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-superpowers',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-superscript',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-support',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-table',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-tablet',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-tachometer',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-tag',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-tags',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-tasks',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-taxi',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-telegram',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-television',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-tencent-weibo',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-terminal',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-text-height',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-text-width',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-th',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-th-large',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-th-list',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-themeisle',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-thermometer',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-thermometer-0',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-thermometer-1',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-thermometer-2',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-thermometer-3',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-thermometer-4',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-thermometer-empty',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-thermometer-full',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-thermometer-half',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-thermometer-quarter',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-thermometer-three-quarters',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-thumb-tack',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-thumbs-down',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-thumbs-o-down',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-thumbs-o-up',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-thumbs-up',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-ticket',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-times',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-times-circle',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-times-circle-o',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-times-rectangle',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-times-rectangle-o',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-tint',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-toggle-down',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-toggle-left',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-toggle-off',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-toggle-on',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-toggle-right',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-toggle-up',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-trademark',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-train',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-transgender',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-transgender-alt',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-trash',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-trash-o',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-tree',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-trello',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-tripadvisor',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-trophy',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-truck',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-try',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-tty',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-tumblr',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-tumblr-square',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-turkish-lira',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-tv',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-twitch',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-twitter',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-twitter-square',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-umbrella',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-underline',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-undo',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-universal-access',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-university',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-unlink',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-unlock',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-unlock-alt',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-unsorted',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-upload',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-usb',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-usd',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-user',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-user-circle',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-user-circle-o',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-user-md',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-user-o',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-user-plus',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-user-secret',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-user-times',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-users',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-vcard',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-vcard-o',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-venus',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-venus-double',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-venus-mars',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-viacoin',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-viadeo',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-viadeo-square',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-video-camera',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-vimeo',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-vimeo-square',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-vine',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-vk',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-volume-control-phone',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-volume-down',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-volume-off',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-volume-up',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-warning',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-wechat',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-weibo',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-weixin',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-whatsapp',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-wheelchair',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-wheelchair-alt',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-wifi',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-wikipedia-w',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-window-close',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-window-close-o',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-window-maximize',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-window-minimize',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-window-restore',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-windows',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-won',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-wordpress',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-wpbeginner',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-wpexplorer',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-wpforms',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-wrench',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-xing',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-xing-square',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-y-combinator',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-y-combinator-square',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-yahoo',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-yc',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-yc-square',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-yelp',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-yen',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-yoast',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-youtube',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-youtube-play',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fa-youtube-square',
                'class' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'activity',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'airplay',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'alert-circle',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'alert-octagon',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'alert-triangle',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'align-center',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'align-justify',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'align-left',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'align-right',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'anchor',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'aperture',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'archive',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'arrow-down-circle',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'arrow-down-left',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'arrow-down-right',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'arrow-down',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'arrow-left-circle',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'arrow-left',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'arrow-right-circle',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'arrow-right',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'arrow-up-circle',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'arrow-up-left',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'arrow-up-right',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'arrow-up',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'at-sign',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'award',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'bar-chart-2',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'bar-chart',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'battery-charging',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'battery',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'bell-off',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'bell',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'bluetooth',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'bold',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'bookmark',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'book-open',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'book',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'box',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'briefcase',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'calendar',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'camera-off',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'camera',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'cast',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'check-circle',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'check-square',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'check',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'chevron-down',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'chevron-left',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'chevron-right',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'chevrons-down',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'chevrons-left',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'chevrons-right',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'chevrons-up',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'chevron-up',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'chrome',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'circle',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'clipboard',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'clock',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'cloud-drizzle',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'cloud-lightning',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'cloud-off',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'cloud-rain',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'cloud-snow',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'cloud',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'codepen',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'codesandbox',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'code',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'coffee',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'columns',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'command',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'compass',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'copy',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'corner-down-left',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'corner-down-right',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'corner-left-down',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'corner-left-up',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'corner-right-down',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'corner-right-up',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'corner-up-left',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'corner-up-right',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'cpu',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'credit-card',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'crop',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'crosshair',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'database',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'delete',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'disc',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            // [
            //     'id' => Generator::uuid4()->toString(),
            //     'name' => 'divide-circle',
            //     'class' => 'feather',
            //     'created_at' => now(),
            //     'updated_at' => now(),
            //     'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
            //     'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            // ],
            // [
            //     'id' => Generator::uuid4()->toString(),
            //     'name' => 'divide-square',
            //     'class' => 'feather',
            //     'created_at' => now(),
            //     'updated_at' => now(),
            //     'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
            //     'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            // ],
            // [
            //     'id' => Generator::uuid4()->toString(),
            //     'name' => 'divide',
            //     'class' => 'feather',
            //     'created_at' => now(),
            //     'updated_at' => now(),
            //     'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
            //     'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            // ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'dollar-sign',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'download-cloud',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'download',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            // [
            //     'id' => Generator::uuid4()->toString(),
            //     'name' => 'dribbble',
            //     'class' => 'feather',
            //     'created_at' => now(),
            //     'updated_at' => now(),
            //     'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
            //     'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            // ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'droplet',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'edit-2',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'edit-3',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'edit',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'external-link',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'eye-off',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'eye',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'facebook',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'fast-forward',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'feather',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'figma',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'file-minus',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'file-plus',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'file',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'file-text',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'film',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'filter',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'flag',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'folder-minus',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'folder-plus',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'folder',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'framer',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'frown',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'gift',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'git-branch',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'git-commit',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'github',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'gitlab',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'git-merge',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'git-pull-request',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'globe',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'grid',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'hard-drive',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'hash',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'headphones',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'heart',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'help-circle',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'hexagon',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'home',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'image',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'inbox',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'info',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'instagram',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'italic',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'key',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'layers',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'layout',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'life-buoy',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'link-2',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'linkedin',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'link',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'list',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'loader',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'lock',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'log-in',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'log-out',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'mail',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'map-pin',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'map',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'maximize-2',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'maximize',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'meh',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'menu',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'message-circle',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'message-square',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'mic-off',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'mic',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'minimize-2',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'minimize',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'minus-circle',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'minus-square',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'minus',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'monitor',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'moon',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'more-horizontal',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'more-vertical',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'mouse-pointer',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'move',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'music',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'navigation-2',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'navigation',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'octagon',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'package',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'paperclip',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'pause-circle',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'pause',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'pen-tool',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'percent',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'phone-call',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'phone-forwarded',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'phone-incoming',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'phone-missed',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'phone-off',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'phone-outgoing',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'phone',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'pie-chart',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'play-circle',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'play',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'plus-circle',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'plus-square',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'plus',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'pocket',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'power',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'printer',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'radio',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'refresh-ccw',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'refresh-cw',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'repeat',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'rewind',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'rotate-ccw',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'rotate-cw',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'rss',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'save',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'scissors',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'search',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'send',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'server',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'settings',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'share-2',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'share',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'shield-off',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'shield',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'shopping-bag',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'shopping-cart',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'shuffle',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'sidebar',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'skip-back',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'skip-forward',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'slack',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'slash',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'sliders',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'smartphone',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'smile',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'speaker',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'square',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'star',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'stop-circle',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'sunrise',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'sunset',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'sun',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'tablet',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'tag',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'target',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'terminal',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'thermometer',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'thumbs-down',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'thumbs-up',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'toggle-left',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'toggle-right',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'tool',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'trash-2',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'trash',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'trello',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'trending-down',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'trending-up',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'triangle',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'truck',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'tv',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'twitch',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'twitter',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'type',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'umbrella',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'underline',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'unlock',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'upload-cloud',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'upload',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'user-check',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'user-minus',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'user-plus',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'users',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'user',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'user-x',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'video-off',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'video',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'voicemail',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'volume-1',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'volume-2',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'volume',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'volume-x',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'watch',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'wifi-off',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'wifi',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'wind',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'x-circle',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'x-octagon',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'x-square',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'x',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'youtube',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'zap-off',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'zap',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'zoom-in',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'zoom-out',
                'class' => 'feather',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('00_icon');
    }
}
