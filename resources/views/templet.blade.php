<!-- resources/views/welcome.blade.php -->  

<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Welcome</title>  
</head>  
<body>  
    <h1>Welcome!</h1>  

    @if($personalBrandData)  
        <p>Nama: {{ $personalBrandData->nama }}</p>  
        <p>NIM: {{ $personalBrandData->nim }}</p>  
        <p>Email: {{ $personalBrandData->email }}</p>  
        <p>Github: {{ $personalBrandData->github }}</p>  
        <p>Link Portfolio: {{ $personalBrandData->linkPortfolio }}</p>  
        <p>Goal: {{ $personalBrandData->goal }}</p>  
        <p>Phone: {{ $personalBrandData->phone }}</p>  
        <img src="{{ asset('storage/'. $personalBrandData->image) }}" alt="Image" />  
    @else  
        <p>No data found.</p>  
    @endif  
</body>  
</html>