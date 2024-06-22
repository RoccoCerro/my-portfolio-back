<?php

namespace App\Http\Controllers\Api;

use App\Models\GithubRepo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class GithubRepoController extends Controller
{
  public function storeGithubRepos()
  {

    $username = 'RoccoCerro';

    $url = "https://api.github.com/users/{$username}/repos";

    $response = Http::get($url);

    if ($response->successful()) {
      $repos = $response->json();

      foreach ($repos as $repo) {
        GithubRepo::create([
            'name' => $repo['name'],
            'url' => $repo['html_url'],
        ]);
      }

      return response()->json(['message' => 'Repositories stored successfully.']);
    }
    
    return response()->json(['message' => 'Failed to fetch repositories.']);

  }
}
