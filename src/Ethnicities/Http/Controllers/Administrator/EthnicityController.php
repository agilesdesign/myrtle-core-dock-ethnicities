<?php

namespace Myrtle\Core\Ethnicities\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Myrtle\Ethnicities\Models\Ethnicity;

class EthnicityController extends Controller
{

	public function index(Ethnicity $policytype)
	{
		$ethnicities = Ethnicity::paginate();

		return view('admin::ethnicities.index')
			->withEthnicities($ethnicities)
			->withPolicytype($policytype);
	}

	public function create(Ethnicity $ethnicity)
	{
		$this->authorize('create', $ethnicity);

		return view('admin::ethnicities.create')->withEthnicity($ethnicity);
	}

	public function store(Request $request, Ethnicity $ethnicity)
	{
		$this->authorize('create', $ethnicity);

		$ethnicity->create($request->toArray());

		flasher()->alert('Ethnicity added successfully', 'success');

		return redirect(route('admin.ethnicities.index'));
	}

	public function edit(Ethnicity $ethnicity)
	{
		$this->authorize('update', $ethnicity);

		return view('admin::ethnicities.edit')->withEthnicity($ethnicity);
	}

	public function update(Request $request, Ethnicity $ethnicity)
	{
		$this->authorize('update', $ethnicity);

		$ethnicity->update($request->toArray());

		flasher()->alert('Ethnicity updated successfully', 'success');

		return redirect(route('admin.ethnicities.index'));
	}

    public function destroy(Request $request, Ethnicity $ethnicity)
    {
        $this->authorize('delete', $ethnicity);

        $ethnicity->delete();

        flasher()->alert('Ethnicity removed successfully', 'success');

        return redirect(route('admin.ethnicities.index'));
    }
}
