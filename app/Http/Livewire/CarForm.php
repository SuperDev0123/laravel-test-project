<?php

namespace App\Http\Livewire;

use Livewire\Component;
use LivewireAlertServiceProvider;
use Livewire\WithFileUploads;
use App\Models\CarModel;
use App\Enums\CarModelStatusEnum;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Validator;

class CarForm extends Component
{
    use WithFileUploads;

    public $modelData;
    public $case;
    public $make;
    public $model;
    public $mileage;
    public $buyingDate;
    public $color;
    public $drivetrain;
    public $picture;
    public $page = 1;
    public $deactive = false;
    public $picture_url;

    protected $queryString = ['page'];
    protected $listeners = ['updateDate' => 'updateDate'];

    protected $models = [
        'BMW' => ['3 Series', '5 Series', '7 Series'],
        'Mercedes' => ['C Class', 'E Class', 'S Class'],
        'Jeep' => ['Wrangler', 'Grand Cherokee'],
    ];

    public function mount()
    {
        $this->modelData = CarModel::where("user_id", auth()->user()->id)->where("status", CarModelStatusEnum::Edit)->first();
        if(!$this->modelData) {
            $this->modelData = CarModel::create([
                "user_id" => auth()->user()->id,
                "status" => CarModelStatusEnum::Edit,
            ]);
        }
        else {
            $this->case = $this->modelData->case ?? null;
            $this->make = $this->modelData->make ?? null;
            $this->model = $this->modelData->model ?? null;
            $this->mileage = $this->modelData->mileage ?? null;
            $this->buyingDate = $this->modelData->buyingDate ? Carbon::parse($this->modelData->buyingDate)->format('m/d/Y') : null;
            $this->color = $this->modelData->color ?? null;
            $this->drivetrain = $this->modelData->drivetrain ?? null;
            $this->picture_url = $this->modelData->picture ?? null;
        }
    }

    public function updated($name, $value)
    {
        if($name == 'picture')
        {
            $this->picture_url = $this->picture->temporaryUrl();
            $path = $this->picture->store('image_uploads', "public");
            $value = Storage::url($path);
        }
        $this->modelData->update([
            $name => $value,
        ]);
    }

    public function updateDate($date)
    {
        $this->buyingDate = $date;
        $this->updated("buyingDate", Carbon::parse($date)->toDateString());
    }

    public function updatePage($page)
    {
        $this->page = $page;
    }

    public function submitNext()
    {

        if($this->mileage > 100)
        {
            $this->dispatchBrowserEvent('alert',  ['type' => 'success',  'message' => 'We can insure your car!']);
            $this->deactive = true;
            return;
        }

        $this->validate([
            'case' => 'required',
            'make' => 'required',
            'model' => 'required',
            'mileage' => 'required|numeric',
            'buyingDate' => 'required|date',
        ]);
        
        $this->page = 2;
    }

    public function removePicture()
    {
        $this->picture_url = null;
        $this->picture = null;
        $this->modelData->update([
            "picture" => null,
        ]);
    }

    public function submitComplete()
    {
        $this->withValidator(function (Validator $validator) {
            $validator->after(function ($validator) {
                if ($validator->failed()) {
                    $this->page = 1;
                }
            });
        })->validate([
            'case' => 'required',
            'make' => 'required',
            'model' => 'required',
            'mileage' => 'required|numeric',
            'buyingDate' => 'required|date',
        ]);
        
        $this->validate([
            'color' => 'required',
            'drivetrain' => 'required_if:model,Grand Cherokee',
            'picture' => 'nullable|image|max:2048',
            'picture_url' => 'required',
        ], [
            'picture_url.required' => 'The picture field is required.',
        ]);

        $this->dispatchBrowserEvent('alert',  ['type' => 'success',  'message' => 'Thank you!']);
    }

    public function render()
    {
        return view('livewire.car-form', [
            'models' => $this->models[$this->make] ?? [],
        ]);
    }
}
