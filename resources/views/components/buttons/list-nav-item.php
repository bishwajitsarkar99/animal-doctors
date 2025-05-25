namespace App\view\components;
use Illuminate App\view\component;

class list-nav-item extends Component
{
    public function render()
    {
        return view(components.buttons.list-nav-item);
    }
}