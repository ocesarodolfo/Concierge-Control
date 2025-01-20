<div class="space-y-6 max-w-2xl mx-auto p-6 bg-white rounded-lg shadow-md">
    <!-- Nome -->
    <div>
        <label for="nome" class="block text-sm font-medium text-gray-700 mb-1">Nome</label>
        <input type="text" name="nome" id="nome"
               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
               value="{{ old('nome', $employee->nome ?? '') }}" required>
    </div>

    <!-- CPF -->
    <div>
        <label for="cpf" class="block text-sm font-medium text-gray-700 mb-1">CPF</label>
        <input type="text" name="cpf" id="cpf"
               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
               value="{{ old('cpf', $employee->cpf ?? '') }}" required>
    </div>

    <!-- Cargo -->
    <div>
        <label for="cargo" class="block text-sm font-medium text-gray-700 mb-1">Cargo</label>
        <input type="text" name="cargo" id="cargo"
               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
               value="{{ old('cargo', $employee->cargo ?? '') }}" required>
    </div>

    <!-- Departamento -->
    <div>
        <label for="departamento" class="block text-sm font-medium text-gray-700 mb-1">Departamento</label>
        <input type="text" name="departamento" id="departamento"
               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
               value="{{ old('departamento', $employee->departamento ?? '') }}" required>
    </div>

    <!-- ID Crachá -->
    <div>
        <label for="id_cracha" class="block text-sm font-medium text-gray-700 mb-1">ID Crachá</label>
        <input type="text" name="id_cracha" id="id_cracha"
               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
               value="{{ old('id_cracha', $employee->id_cracha ?? '') }}" required>
    </div>

    <!-- Foto -->
    <div>
        <label for="foto" class="block text-sm font-medium text-gray-700 mb-1">Foto</label>
        <input type="file" name="foto" id="foto"
               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
        @if(isset($employee) && $employee->foto)
            <div class="mt-3">
                <img src="{{ asset('storage/' . $employee->foto) }}" alt="Foto do Funcionário"
                     class="w-20 h-20 rounded-lg object-cover shadow-sm">
            </div>
        @endif
    </div>
</div>