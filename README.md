# Projeto Open Weather API

Este projeto é uma aplicação web desenvolvida em Laravel que consome a API do Open Weather para fornecer informações sobre o clima. A arquitetura do projeto utiliza padrões de design como Adapter e Service Layer para organizar o código de forma limpa e escalável.

## Índice

- [Tecnologias Utilizadas](#tecnologias-utilizadas)
- [Instalação](#instalação)
- [Configuração](#configuração)
- [Estrutura do Projeto](#estrutura-do-projeto)
- [Como Usar](#como-usar)
- [Contribuição](#contribuição)
- [Licença](#licença)

## Tecnologias Utilizadas

- [Laravel](https://laravel.com/) - Framework PHP
- [Guzzle](https://docs.guzzlephp.org/en/stable/) - Cliente HTTP para PHP
- [Open Weather API](https://openweathermap.org/api) - API para dados meteorológicos
- [PHP](https://www.php.net/) - Linguagem de programação

Aqui está um modelo de README para um projeto que utiliza a API do Open Weather, implementado em Laravel com os padrões de design Adapter e Service Layer, usando o Guzzle para consumir a API:

markdown

# Projeto Open Weather API

Este projeto é uma aplicação web desenvolvida em Laravel que consome a API do Open Weather para fornecer informações sobre o clima. A arquitetura do projeto utiliza padrões de design como Adapter e Service Layer para organizar o código de forma limpa e escalável.

## Índice

- [Tecnologias Utilizadas](#tecnologias-utilizadas)
- [Configuração](#configuração)
- [Estrutura do Projeto](#estrutura-do-projeto)
- [Instalação](#instalação)
- [Como Usar](#como-usar)
- [Contribuição](#contribuição)
- [Licença](#licença)

## Tecnologias Utilizadas

- [Laravel](https://laravel.com/) - Framework PHP
- [Guzzle](https://docs.guzzlephp.org/en/stable/) - Cliente HTTP para PHP
- [Open Weather API](https://openweathermap.org/api) - API para dados meteorológicos
- [PHP](https://www.php.net/) - Linguagem de programação

## Estrutura do Projeto

A estrutura do projeto é organizada da seguinte forma:

```bash
app/
├── Adapter/
│   └── Weather/
│       └── OpenWeatherAdapter.php   # Adaptador para a API do Open Weather
├── Service/
│   └── CreateWeatherService.php      # Camada de serviço para manipulação de dados do clima
└── Http/
    ├── Controllers/
    │   └── WeatherController.php      # Controlador para gerenciar requisições relacionadas ao clima

    Adapter: Implementa a lógica de comunicação com a API do Open Weather.
    Service Layer: Contém a lógica de negócio e manipulação dos dados obtidos da API.
    Controller: Controla as requisições HTTP e coordena as interações entre o Adapter e o Service Layer.
```
