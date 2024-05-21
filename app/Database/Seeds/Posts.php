<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Posts extends Seeder
{
    public function run()
    {
        $dir=
        $faker = \Faker\Factory::create("id_ID");
        $jumlah = 10;
        for ($i=0; $i < $jumlah ; $i++) { 
            $username = $faker->name;
            $post_title = $faker->city;
            $post_title_seo =  $post_title;
            $post_status = $faker->randomElement(['active','inactive']);
            $post_thumbnail = $faker->imageUrl($width = 540, $height = 480);
            $post_description = $faker->sentence($nbWords = 6, $variableNbWords = true);
            $post_content = $faker->sentence($nbWords = 6, $variableNbWords = true);
        }
        
        $data[] = [
            'username' => $username,
            'post_title_seo' => $post_title_seo,
            'post_title' => $post_title,
            'post_status' => $post_status,
            'post_thumbnail' => $post_thumbnail,
            'post_description'=> $post_description,
            'post_content'=>$post_content
        ];
        $this->db->table('posts')->insert($data);
    }
}
