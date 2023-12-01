<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
// use App\Models\Filetxt;
use App\Models\Articulo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LwarticulosUpload extends Component
{

    use WithFileUploads;
    public $file, $title;

    public function submit()
    {
        // esto anda oka pero arma tabla
        // $validatedData = $this->validate([
        //     'title' => 'required',
        //     'file' => 'required',
        // ]);

        // $validatedData['name'] = $this->file->store('files');

        // $filetxt = Filetxt::create($validatedData);

        $this->validate([
            'file' => 'required|max:1024', // 1MB Max
        ]);

        $filename = $this->file->storeAs('import','articulo.txt');

        $archivo = Storage::get($filename);

        //dd($archivo);

        $nuevos=0;
        $act=0;
        foreach (explode("\n", $archivo) as $key => $line) {
            // $array[$key] = explode(';', $line);
            $registro = explode(';', $line);
            if ($registro[0] > 0) {
                // entra si tiene codigo de registro o sea no es una lnea en blanco
                $articulo = Articulo::where('codart', $registro[0])->first();
                if (is_null($articulo)) {
                    $articulo = new Articulo;
                    $articulo->create([
                        'codart' => $registro[0],
                        'nombre' => $registro[2],
                        'nombregrid' => $registro[2],
                        'precio' => $registro[3]
                    ]);
                    $nuevos++;
                } else {
                    // existe tenemos q actualizar el precio
                    $articulo->nombre = $registro[2];
                    $articulo->precio = $registro[3];
                    $articulo->update();
                    $act++;
                }
            }
        }

        $this->file="";
//        $this->reset();

        session()->flash('message', 'Importacion correcta, '.$nuevos. ' nuevos / '.$act.' actualizados');
    }

    public function cancelarArticulos()
    {
        return redirect()->to('/');
    }

    public function render()
    {
        return view('livewire.lwarticulos-upload');
    }
}
