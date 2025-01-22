<div class="max-w-2xl mx-auto p-8 bg-white rounded-xl shadow-lg space-y-6">
    <!-- Exibir foto do funcionário, se existir -->
    @if(isset($employee) && $employee->picture)
        <div class="flex justify-center">
            <div class="relative group">
                <img src="{{ asset('storage/' . $employee->picture) }}" alt="Foto do Funcionário"
                     class="w-40 h-40 rounded-xl object-cover shadow-md group-hover:shadow-lg transition-shadow duration-300">
                <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-20 rounded-xl transition duration-300"></div>
            </div>
        </div>
    @endif

    <!-- Grid de campos -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Campo Nome -->
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nome</label>
            <input type="text" name="name" id="name"
                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 placeholder-gray-400"
                   value="{{ old('name', $employee->name ?? '') }}"
                   placeholder="Digite o nome completo"
                   required>
            @error('name')
            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <!-- Campo Active (Ativo/Inativo) -->
        <div>
            <label for="active" class="block text-sm font-medium text-gray-700 mb-2">Autorizado</label>
            <select name="active" id="active"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                <option value="1" {{ (old('active', $employee->active ?? '') == 1) ? 'selected' : '' }}>Sim</option>
                <option value="0" {{ (old('active', $employee->active ?? '') == 0) ? 'selected' : '' }}>Não</option>
            </select>
            @error('active')
            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <!-- Campo Documento -->
        <div>
            <label for="document" class="block text-sm font-medium text-gray-700 mb-2">Documento</label>
            <input type="text" name="document" id="document"
                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 placeholder-gray-400"
                   value="{{ old('document', $employee->document ?? '') }}"
                   placeholder="Digite o Documento"
                   required>
            @error('document')
            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <!-- Campo Vehicle Plate -->
        <div>
            <label for="document" class="block text-sm font-medium text-gray-700 mb-2">Placa do Veículo</label>
            <input type="text" name="vehicle_plate" id="vehicle_plate"
                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 placeholder-gray-400"
                   value="{{ old('document', $employee->vehicle_plate ?? '') }}"
                   placeholder="Digite a Placa do veículo"
                   required>
            @error('vehicle_plate')
            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <!-- Campo Empresa -->
        <div>
            <label for="enterprise" class="block text-sm font-medium text-gray-700 mb-2">Empresa</label>
            <input type="text" name="enterprise" id="enterprise"
                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 placeholder-gray-400"
                   value="{{ old('enterprise', $employee->enterprise ?? '') }}"
                   placeholder="Digite o nome da empresa"
                   required>
            @error('enterprise')
            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <!-- Campo Departamento -->
        <div>
            <label for="department" class="block text-sm font-medium text-gray-700 mb-2">Departamento</label>
            <input type="text" name="department" id="department"
                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 placeholder-gray-400"
                   value="{{ old('department', $employee->department ?? '') }}"
                   placeholder="Digite o departamento"
                   required>
            @error('department')
            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <!-- Campo Crachá -->
        <div>
            <label for="code" class="block text-sm font-medium text-gray-700 mb-2">Crachá</label>
            <input type="text" name="code" id="code"
                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 placeholder-gray-400"
                   value="{{ old('code', $employee->code ?? '') }}"
                   placeholder="Digite o número do crachá"
                   required>
            @error('code')
            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <!-- Campo Foto -->
        <div class="md:col-span-2">
            <label for="picture" class="block text-sm font-medium text-gray-700 mb-2">Foto</label>
            <div class="flex items-center justify-center w-full">
                <label for="picture" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 transition duration-200">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                        <svg class="w-8 h-8 mb-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L7 9m3-3 3 3"/>
                        </svg>
                        <p class="mb-2 text-sm text-gray-500">
                            <span class="font-semibold">Clique para enviar</span> ou arraste uma foto
                        </p>
                        <p class="text-xs text-gray-500">PNG, JPG ou JPEG (MAX. 5MB)</p>
                    </div>
                    <input type="file" name="picture" id="picture" class="hidden" accept="image/*">
                </label>
            </div>
            @error('picture')
            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>
    </div>
</div>