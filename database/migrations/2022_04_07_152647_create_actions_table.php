<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Ramsey\Uuid\Uuid as Generator;
use Illuminate\Support\Carbon;

class CreateActionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('98_actions', function (Blueprint $table) {
            $table->string('id', 40)->primary()->index();
            $table->string('name');
            $table->text('desc');
            $table->string('created_by', 40);
            $table->string('updated_by', 40);
            $table->timestamps();
            $table->softDeletes();
        });

        DB::table('98_actions')->insert([
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'View',
                'desc' => 'Aksi untuk melihat modul',
                'created_at' => Carbon::now()->addSecond(1),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'Create',
                'desc' => 'Aksi untuk menambahkan data pada modul',
                'created_at' => Carbon::now()->addSecond(2),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'Read',
                'desc' => 'Aksi untuk melihat detail data pada modul',
                'created_at' => Carbon::now()->addSecond(3),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'Update',
                'desc' => 'Aksi untuk memperbarui data pada modul',
                'created_at' => Carbon::now()->addSecond(4),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
            [
                'id' => Generator::uuid4()->toString(),
                'name' => 'Delete',
                'desc' => 'Aksi untuk menghapus data pada modul',
                'created_at' => Carbon::now()->addSecond(5),
                'updated_at' => now(),
                'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
                'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('98_actions');
    }
}
