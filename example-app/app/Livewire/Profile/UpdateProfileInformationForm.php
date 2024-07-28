namespace App\Http\Livewire\Profile;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class UpdateProfileInformationForm extends Component
{
    use WithFileUploads;

    public $state = [];
    public $photo;

    public function mount()
    {
        $this->state = Auth::user()->withoutRelations()->toArray();
    }

    public function updateProfileInformation()
    {
        $this->validate([
            'state.name' => ['required', 'string', 'max:255'],
            'state.email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')->ignore(Auth::user()->id)],
            'photo' => ['nullable', 'image', 'max:1024'], // Максимальный размер 1MB
        ]);

        if ($this->photo) {
            Auth::user()->updateProfilePhoto($this->photo);
        }

        Auth::user()->forceFill([
            'name' => $this->state['name'],
            'email' => $this->state['email'],
        ])->save();

        $this->emit('saved');
    }

    public function deleteProfilePhoto()
    {
        Auth::user()->deleteProfilePhoto();
        $this->emit('photoDeleted');
    }

    public function render()
    {
        return view('profile.update-profile-information-form');
    }
}
