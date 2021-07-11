<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Contracts\Auth\Authenticatable as UserContract;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Throwable;
use Illuminate\Notifications\Notifiable;

class PlantTest extends TestCase
{


    /** @test */
    public function plant_can_be_added() {
        $this->withoutExceptionHandling();

        $response = $this->post('/admin/add-product',[
            'plant_id_number'=>'555555',
            'botanical_name'=> 'test botanical name plant 1',
            'common_name'=> 'test common name plant 1'
        ]);

        $response->assertOk();

        //$response->assertSessionHasErrors('plant_id_number');

        $this->assertCount(1306, Product::all());

    }

    /** @test */
    public function plant_id_is_required() {
        //$this->withoutExceptionHandling();

        $response = $this->post('/admin/add-product',[
            'plant_id_number'=>'',
            'botanical_name'=> 'test botanical name plant 1',
            'common_name'=> 'test common name plant 1'
        ]);

        //$response->assertOk();

        $response->assertSessionHasErrors('plant_id_number');

        //$this->assertCount(1304, Product::all());

    }

    /** @test */
    public function plant_can_be_updated() {
        $this->withoutExceptionHandling();

        $plant = $this->post('/admin/add-product',[
            'plant_id_number'=>'555555',
            'botanical_name'=> 'test botanical name plant 1',
            'common_name'=> 'test common name plant 1'
        ]);

        //$response->assertOk();

        $product_info = Product::orderBy('id', 'desc')->first();

        $this->patch('/admin/edit-product/'.$product_info->id,[
            'plant_id_number'=>'555556',
            'botanical_name'=> 'test botanical name plant 2',
            'common_name'=> 'test common name plant 2'
        ]);

        $product_info1 = Product::orderBy('id', 'desc')->first();

        //$response->assertSessionHasErrors('plant_id_number');

        $this->assertEquals('555556',$product_info1->plant_id_number);
        $this->assertEquals('test botanical name plant 2',$product_info1->botanical_name);
        $this->assertEquals('test common name plant 2',$product_info1->common_name);

    }
}
