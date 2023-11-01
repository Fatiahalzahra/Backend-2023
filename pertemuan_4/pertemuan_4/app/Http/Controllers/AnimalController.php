<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public  $animals = 
    #property animals
    [
        ["name" => "Kucing anggora"],
        ["name" => "Anjing"],
        ["name" => "burung"]
    ];
    # method constructor - mengisi data awal
    # parameter: data hewan (array)
    public function __construct($animals)
    {
        $this->animals = $animals;
    }

    # method index - menampilkan data animals
    public function index()
    {
        # gunakan foreach untuk menampilkan data animals (array)
        $itteration = 1;
       foreach($this->animals as $animal) {
        echo $itteration, ". ", $animal, "<br>";
        $itteration++;
       }
    }

    # method store - menambahkan hewan baru
    # parameter: hewan baru
    public function store($newAnimal)
    {
        # gunakan method array_push untuk menambahkan data baru
        array_push($this->animals,$newAnimal);
    }

    # method update - mengupdate hewan
    # parameter: index dan hewan baru
    public function update($index, $newAnimal)
    {
        $this->animals[$index] = $newAnimal;
    }

    # method delete - menghapus hewan
    # parameter: index
    public function destroy($index)
    {
        # gunakan method unset atau array_splice untuk menghapus data array
        unset($this->animals[$index]);
    }
    
}
