    @foreach ($subgrupos as $subgrupo)
        <option>-- Selecione um subgrupo --</option>
        <option value="{{ $subgrupo->id }}"
            {{ ($subgrupo_id ?? old('subgrupo_id')) == $subgrupo->id ? 'selected' : '' }}>
            {{ $subgrupo->nome }}</option>
    @endforeach
