<?php

namespace App\Http\Controllers;

use App\Services\CardMovimentacaoService;
use App\Services\CursoService;
use App\Services\CardService;
use App\Services\StatusService;

class KanbanController extends Controller
{

    protected $cursoService;
    protected $cardService;
    protected $statusService;

    public function __construct(CursoService $cursoService, CardService $cardService, StatusService $statusService)
    {
        $this->cursoService = $cursoService;
        $this->cardService = $cardService;
        $this->statusService = $statusService;
    }

    function index()
    {
        $data['statusList'] = $this->statusService->getAll();
        $coursesList = $this->cursoService->listAll();
        $num_aulas = $this->cardService->listClasses([]);
        $cardsList = $this->cardService->all();
        $cardsList = $this->statusService->ordernarArray($cardsList);
        $data['cardsList'] = $cardsList;
        $html = view('kanban.layouts.cards', $data);
        $html = mb_convert_encoding($html, 'UTF-8', 'UTF-8');
        return view('kanban.index', compact('coursesList', 'html', 'num_aulas'));
    }
}
