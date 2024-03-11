<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\GiftFavorito;
use Illuminate\Support\Facades\Log;
class GiphyController extends Controller
{
    public function showDashboard()
    {
        return view('dashboard');
    }
    public function showSearchGifsByIdForm()
        {
            return view('search-gifs-by-id');
        }
    
        public function searchGifById(Request $request)
        {
            $request->validate([
                'gif_id' => 'required|string',
            ]);
        
            $id = $request->input('gif_id');
        
            $client = new Client();
            $response = $client->get("https://api.giphy.com/v1/gifs/{$id}", [
                'query' => [
                    'api_key' => 'GoJDDDddrSTTWs1WmjvNrn9sCNQiKIn1', 
                ],
            ]);
        
            $gif = json_decode($response->getBody()->getContents());
        
            if (empty($gif->data)) {
                return redirect()->route('search-gifs-by-id')->withErrors(['error' => 'No GIF found with the provided ID']);
            }
        
            $logInfo = 'Usuario: ' . auth()->user()->name . ' | ' .
            'Servicio: Búsqueda de GIF por ID | ' .
            'ID del GIF: ' . $id . ' | ' .
            'Código HTTP de la respuesta: ' . $response->getStatusCode() . ' | ' .
            'Cuerpo de la respuesta: ' . json_encode($gif) . ' | ' .
            'IP de origen de la consulta: ' . $request->ip();
        
            Log::channel('registro')->info($logInfo);
        
            return view('show-gif-by-id', ['gif' => $gif]);
        }
        
        
        public function showSearchGifsByPhraseForm()
        {
            return view('search-gifs-by-phrase');
        }
        public function searchGifsByPhrase(Request $request)
        {
            $request->validate([
                'phrase' => 'required|string',
                'limit' => 'sometimes|numeric',
                'offset' => 'sometimes|numeric',
            ]);
    
            $phrase = $request->input('phrase');
            $limit = $request->input('limit', 10); 
            $offset = $request->input('offset', 0); 
    
            $client = new Client();
            $response = $client->get('https://api.giphy.com/v1/gifs/search', [
                'query' => [
                    'api_key' => 'GoJDDDddrSTTWs1WmjvNrn9sCNQiKIn1',
                    'q' => $phrase,
                    'limit' => $limit,
                    'offset' => $offset,
                ],
            ]);
            $gifs = json_decode($response->getBody()->getContents());
    

            $logInfo = 'Usuario: ' . auth()->user()->name . ' | ' .
            'Servicio: Búsqueda de GIFs por frase | ' .
            'Parámetros de la solicitud: ' . json_encode($request->all()) . ' | ' .
            'Código HTTP de la respuesta: ' . $response->getStatusCode() . ' | ' .
            'Cuerpo de la respuesta: ' . json_encode($gifs) . ' | ' .
            'IP de origen de la consulta: ' . $request->ip();

            Log::channel('registro')->info($logInfo);
            return view('search-by-phrase-results', ['gifs' => $gifs->data]);
        }    

        public function showAddToFavoritesForm()
        {
            return view('add-to-favorites');
        }
        public function addToFavorites(Request $request)
        {
            $request->validate([
                'gif_id' => 'required|string',
                'alias' => 'required|string',
                'user_id' => 'required|numeric',
            ]);
            $giftFavorite = new GiftFavorito();
            $giftFavorite->gif_id = $request->input('gif_id');
            $giftFavorite->alias = $request->input('alias');
            $giftFavorite->user_id = $request->input('user_id');
            $giftFavorite->save();
            $logInfo = 'Usuario: ' . auth()->user()->name . ' | ' .
            'Servicio: Añadir a favoritos | ' .
            'Cuerpo de la petición: ' . json_encode($request->all()) . ' | ' .
            'Código HTTP de la respuesta: ' . http_response_code() . ' | ' .
            'Cuerpo de la respuesta: ' . json_encode($giftFavorite) . ' | ' .
            'IP de origen de la consulta: ' . $request->ip();

            Log::channel('registro')->info($logInfo);

            return redirect()->route('dashboard');
        }
}
