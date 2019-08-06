# API FRETE

PHP >= 7.2
MySQL
Composer

## Instalação

1. Clone o projeto.
2. Na raiz do projeto execute `composer install`.
3. Crie o banco de dados que está dentro da pasta database.
4. Crie um banco de dados vazio com o nome de truckpad_test
5. Em config/app.php "Datasources" ajuste a configuração do banco "default" para o usuario e senha correto.
6. Configure também a conexão "test".

## Inclusão de Motorista
http://base_url/motorista [POST]

### Parâmetros
```bash
{
	"nome": "String obrigatório",
	"cpf": "Obrigatório e único",
	"data_nascimento": "Obrigatório - Data padrão d/m/Y, idade > 18 e <= 65",
	"tipo_cnh": "Obrigatório - Use 'B', 'C', 'D' ou 'E'",
	"sexo": "Obrigatório - Use 'm' ou 'f'"
}
```

## Alteração de Motorista
http://base_url/motorista [PUT]

### Parâmetros
```bash
{
	"id": "Obrigatório"
	"nome": "String opcional",
	"cpf": "Opcional e único",
	"data_nascimento": "Opcional padrão d/m/Y, idade > 18 e <= 65",
	"tipo_cnh": "Opcional 'B', 'C', 'D' ou 'E'",
	"sexo": "Opcional 'm' ou 'f'"
}
```

## Inclusão de Veículos
http://base_url/veiculo [POST]

### Parâmetros
```bash
{
  "motorista_id": "Opcional, INT.",
  "placa": "Obrigatório e único",
  "marca": "Obrigatório - String",
  "modelo": "Obrigatório - String",
  "veiculo_tipo_id": "Obrigatório - ID conforme tabela enviada."
}
```

## Inclusão de Frete
http://base_url/frete [POST]

### Parâmetros
```bash
{
  "motorista_id": "Obrigatório, INT",
  "veiculo_id": "Obrigatório, INT",
  "lat_destino": "Obrigatório, Latitude",
  "lng_destino": "Obrigatório, Longitude",
  "lat_origem": "Obrigatório, Latitude",
  "lng_origem": "Obrigatório, Longitude",
  "tempo": "Obrigatório, INT minutos",
  "distancia": "Obrigatório, INT KM"
}
```

## Consulta camioneiro sem carga para voltar
http://base_url/frete/carga_voltar [GET]

## Consulta cargas realizada por período
http://base_url/frete/qtd_frete?type=dia [GET]

### Parâmetros
```bash
type (dia, semana, mes).
Parametro opcional. Default dia.
```

## Consulta origem destino ordernado por tipo(Caminhão)
http://base_url/frete/origem_destino?type=dia [GET]

### Parâmetros
```bash
type (dia, semana, mes).
Parametro opcional. Default dia.
```