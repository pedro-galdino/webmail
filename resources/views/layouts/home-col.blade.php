<div class="col-6 mt-3">
    <h2>{{ $h2 }}</h2> <hr>
    <div class="div-email">
    @forelse ($emails as $email)
        @php $uniqid = uniqid(); $type = strtok($readed, '_'); @endphp
        <a href="/principal/{{ Crypt::encrypt($email->id) }}" class="no-link" id="{{ $uniqid }}">
            @if ($email-> $readed)
            <div class="d-flex align-items-center rounded-3 border-bottom border-top py-1 row gx-1" style="font-weight: 600; background-color: #f2f2f2;">
            @else
            <div class="d-flex align-items-center rounded-3 border-bottom border-top py-1 row gx-1" style="font-weight: 700; background-color: #ffffff;">
            @endif
                <div class="col-3 gx-3" style="overflow: hidden; white-space: nowrap;">
                    @if (($type == 'sender' && $email-> $type == $email->recipient) || ($type == 'recipient' && $email-> $type == $email->sender))
                        eu   
                    @elseif($type == 'sender')
                        Para: {{ $email->recipient }}
                    @else
                        De: {{ $email->sender_name }}
                    @endif
                </div>
                <div class="col-4 gx-5" style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">
                    {{ $email->subject }}
                </div>
                <div class="col-2 gx-3" style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis; font-weight: normal;">
                    {{ $email->body }}
                </div>
                <div class="col-3 gx-5 hidden-div" style="font-size: 0.9rem;" id="{{ $uniqid }}">
                    {{ $email->created_at->format('d/m/Y') }}
                </div>
                <div class="col-3 gx-5 show-div" style="font-size: 0.9rem; display: none" id="{{ $uniqid }}">
                    <button form="form1" onclick="excluir({{ $email->id }})"><i class="fa-solid fa-trash-can" title="Excluir"></i></button>
                    @if ($email-> $readed)
                    <button form="form1" onclick="ler({{ $email->id }})"><i class="fa-solid fa-envelope" title="Marcar como não lido"></i></button>
                    @else
                    <button form="form1" onclick="ler({{ $email->id }})"><i class="fa-solid fa-envelope-open" title="Marcar como lido"></i></button>
                    @endif
                </div>
            </div>
        </a>
    @empty
        <div class="d-flex justify-content-center"> Você não {{ $acao }} e-mail(s). </div>
    @endforelse
    </div>
</div>
