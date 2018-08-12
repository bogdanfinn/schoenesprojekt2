<?php

namespace App\Controller;

use App\CooleServices\PokemonService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Serializer\SerializerInterface;

class PokemonRestController extends Controller
{
    /**
     * @Route("/api/pokemon", name="pokemon_rest")
     */
    public function index(SerializerInterface $serializer, PokemonService $pokemonService)
    {
        $pokemon = $pokemonService->getAllPokemon();

        $serializedObject = $serializer->serialize($pokemon, 'json');

        return new JsonResponse(json_decode($serializedObject));
    }

    /**
     * @Route("/api/pokemon/{id}", name="pokemon_rest_detail")
     */
    public function getPokemonInformation($id, SerializerInterface $serializer, PokemonService $pokemonService)
    {
        $pokemonEntity = $pokemonService->getPokemonById($id);

        $serializedObjects = $serializer->serialize($pokemonEntity, 'json');

        return new JsonResponse(json_decode($serializedObjects));
    }
}
