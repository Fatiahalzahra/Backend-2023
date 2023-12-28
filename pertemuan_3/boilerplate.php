<?php

# membuat class Animal
class Animal
{
    public  $animals; 
    #property animals

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
        $itteration;
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

# membuat object
# kirimkan data hewan (array) ke constructor
$animal = new Animal(['Dog','Anjing']);

echo "Index - Menampilkan seluruh hewan <br>";
$animal->index();
echo "<br>";

echo "Store - Menambahkan hewan baru <br>";
$animal->store('burung');
$animal->index();
echo "<br>";

echo "Update - Mengupdate hewan <br>";
$animal->update(0, 'Kucing Anggora');
$animal->index();
echo "<br>";

echo "Destroy - Menghapus hewan <br>";
$animal->destroy(1);
$animal->index();
echo "<br>";