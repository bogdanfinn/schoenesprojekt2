<?php
/**
 * Created by PhpStorm.
 * User: bogdan
 * Date: 12.08.18
 * Time: 09:31
 */

namespace App\CooleServices;

use App\Entity\Pokemon;
use Doctrine\ORM\EntityManagerInterface;

class PokemonService
{
    const API_URL = 'http://pokeapi.co/api/v2/pokemon/{id}';

    private $entityManager;

    /**
     * PokemonService constructor.
     * @param $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getAllPokemon()
    {
        return $this->entityManager->getRepository(Pokemon::class)->findAll();
    }

    public function getPokemonById($id)
    {
        $pokemonEntity = $this->entityManager->getRepository(Pokemon::class)->find($id);

        if ($pokemonEntity != null) {
            return $pokemonEntity;
        }

        $pokemonEntity = new Pokemon();

        try {
            $pokemon = $this->callPokemonApi($id);
        } catch (\Exception $e) {
            return null;
        }

        $this->updatePokemonEntity($pokemonEntity, $pokemon);

        return $pokemonEntity;
    }

    /**
     * @param $pokemonEntity
     * @param $pokemon
     */
    private function updatePokemonEntity(Pokemon $pokemonEntity, $pokemon): void
    {
        $pokemonEntity->setId($pokemon['id']);
        $pokemonEntity->setName($pokemon['name']);
        $pokemonEntity->setHeight($pokemon['height']);
        $pokemonEntity->setWeight($pokemon['weight']);
        $pokemonEntity->setPicture($pokemon['sprites']['front_default']);

        $this->entityManager->persist($pokemonEntity);
        $this->entityManager->flush();
    }

    private function callPokemonApi($id)
    {
        $url = str_replace('{id}', $id, self::API_URL);
        return json_decode(file_get_contents($url), true);
    }

}