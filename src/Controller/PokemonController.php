<?php

namespace App\Controller;

use App\CooleServices\PokemonService;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PokemonController extends Controller
{
    /**
     * @Route("/pokemon", name="pokemon")
     */
    public function index(PokemonService $pokemonService)
    {
        $pokemons = $pokemonService->getAllPokemon();

        return $this->render('pokemon/index.html.twig', [
            'pokemons' => $pokemons,
        ]);
    }

    /**
     * @Route("/pokemon/{id}", name="pokemon_details")
     */
    public function detail($id, PokemonService $pokemonService)
    {
        $pokemonEntity = $pokemonService->getPokemonById($id);

        return $this->render('pokemon/details.html.twig', [
            'pokemonEntity' => $pokemonEntity,
            'id' => $id,
        ]);
    }
}
