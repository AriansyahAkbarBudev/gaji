<div data-theme="cupcake" class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
    <div class="p-6">
        <form wire:submit.prevent='createPegawai'>
            <div>

                @if (session()->has('message'))

                <div class="alert alert-success">

                    {{ session('message') }}

                </div>

                @endif

            </div>
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Nama Pegawai</span>
                </label>
                <input wire:model='namapegawai' type="text" placeholder="username"
                    class="input @error('namapegawai') input-error @enderror input-accent input-bordered">
                @error('namapegawai') <span class="error text-red-400 mt-4">{{ $message }}</span>
                @enderror
                <label class="label">
                    <span class="label-text">Gaji Pegawai</span>
                </label>
                <label class="input-group input-group-sm">
                    <span>Gaji</span>
                    <input wire:model='totalgaji' type="text"
                        class="input input @error('totalgaji') input-error @enderror input-accent input-sm">
                    <span>IDR</span>
                </label>
                @error('totalgaji') <span class="error text-red-400 mt-4">{{ $message }}</span>
                @enderror
                <button type="submit" class="btn btn-active btn-accent mt-2">Save</button>
            </div>
        </form>

    </div>

    <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l">
        <livewire:pegawai.pegawai-table-view />
    </div>

    <div class="p-6  border-gray-200">

    </div>

    <div class="p-6 border-t border-gray-200 md:border-l">
        <livewire:pegawai.gaji-table-view />
    </div>
</div>
