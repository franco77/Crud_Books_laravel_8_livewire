<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Customer;

class Customers extends Component
{
	use WithPagination;

	protected $paginationTheme = 'bootstrap';
	public $selected_id, $keyWord, $ic, $first_name, $last_name, $email, $phone, $address, $gender, $profile;
	public $updateMode = false;

	public function render()
	{
		$keyWord = '%' . $this->keyWord . '%';
		return view('livewire.customers.view', [
			'customers' => Customer::latest()
				->orWhere('ic', 'LIKE', $keyWord)
				->orWhere('first_name', 'LIKE', $keyWord)
				->orWhere('last_name', 'LIKE', $keyWord)
				->orWhere('email', 'LIKE', $keyWord)
				->orWhere('phone', 'LIKE', $keyWord)
				->orWhere('address', 'LIKE', $keyWord)
				->orWhere('gender', 'LIKE', $keyWord)
				->orWhere('profile', 'LIKE', $keyWord)
				->paginate(10),
		]);
	}

	public function cancel()
	{
		$this->resetInput();
		$this->updateMode = false;
	}

	private function resetInput()
	{
		$this->ic = null;
		$this->first_name = null;
		$this->last_name = null;
		$this->email = null;
		$this->phone = null;
		$this->address = null;
		$this->gender = null;
		$this->profile = null;
	}

	public function store()
	{
		$this->validate([
			'ic' => 'required',
			'first_name' => 'required',
			'last_name' => 'required',
			'email' => 'required',
			'phone' => 'required',
			'address' => 'required',
			'gender' => 'required',
			'profile' => 'required',
		]);

		Customer::create([
			'ic' => $this->ic,
			'first_name' => $this->first_name,
			'last_name' => $this->last_name,
			'email' => $this->email,
			'phone' => $this->phone,
			'address' => $this->address,
			'gender' => $this->gender,
			'profile' => $this->profile
		]);

		$this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Customer Successfully created.');
	}

	public function edit($id)
	{
		$record = Customer::findOrFail($id);

		$this->selected_id = $id;
		$this->ic = $record->ic;
		$this->first_name = $record->first_name;
		$this->last_name = $record->last_name;
		$this->email = $record->email;
		$this->phone = $record->phone;
		$this->address = $record->address;
		$this->gender = $record->gender;
		$this->profile = $record->profile;

		$this->updateMode = true;
	}

	public function update()
	{
		$this->validate([
			'ic' => 'required',
			'first_name' => 'required',
			'last_name' => 'required',
			'email' => 'required',
			'phone' => 'required',
			'address' => 'required',
			'gender' => 'required',
			'profile' => 'required',
		]);

		if ($this->selected_id) {
			$record = Customer::find($this->selected_id);
			$record->update([
				'ic' => $this->ic,
				'first_name' => $this->first_name,
				'last_name' => $this->last_name,
				'email' => $this->email,
				'phone' => $this->phone,
				'address' => $this->address,
				'gender' => $this->gender,
				'profile' => $this->profile
			]);

			$this->resetInput();
			$this->updateMode = false;
			session()->flash('message', 'Customer Successfully updated.');
		}
	}

	public function destroy($id)
	{
		if ($id) {
			$record = Customer::where('id', $id);
			$record->delete();
		}
	}
}
