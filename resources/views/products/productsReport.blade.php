
<html>

<div style="width: 100%; border-bottom: 1px solid #e8e8e8; height: 30px;">
    <div style="float: left;">
        <label style="font-size: 18px;">IMPRISOL</label>
    </div>
    <br><br>
    <div style="float: left; width: 50px; heigth: 50px;">
        <img scr="<?php __DIR__?>../../../public/img/imprisol.jpg">
    </div>
    <div style="float: right;">
        <label style="font-size: 18px;">{{ $fecha }}</label>
    </div>
</div>
<div style="width: 100%; display: flex; justify-content: center; 
        align-items: center;">
    <h1 style="font-weight: 100; font-size: 30px; text-align: center;">
        ** Mantenimientos del Producto **
    </h1>
</div>
<div style="width: 100%; padding-bottom: 8px;">
    <table style="width: 100%; border-color: #666666; border-style: dashed; border-width: 1px; padding-top: 5px;">        
        <thead>
            <tr>
                <th style="padding-bottom: 5px; border-color:#666666; border-right-style: dashed; border-width: 1px; padding: 2px"> Nro</th>
                <th style="padding-bottom: 5px; border-color:#666666; border-right-style: dashed; border-width: 1px; padding: 2px"> Fecha </th>
                <th style="padding-bottom: 5px; border-color:#666666; border-right-style: dashed; border-width: 1px; padding: 2px"> Monto </th>
                <th style="padding-bottom: 5px; border-color:#666666; border-right-style: dashed; border-width: 1px; padding: 2px"> Cliente </th>
                <th style="padding-bottom: 5px; border-color:#666666; border-right-style: dashed; border-width: 1px; padding: 2px"> Nit Cliente</th>
            </tr>
        </thead>

        <tbody>
            {{ $nro = 1 }}
            @foreach ($data as $row)
                <tr>
                    <td style="border-color:#666666; border-top-style: dashed; border-right-style: dashed; border-width: 1px; padding: 2px">{{ $nro }}</td>
                    <td style="border-color:#666666; border-top-style: dashed; border-right-style: dashed; border-width: 1px; padding: 2px">{{ $row->date }}</td>                
                    <td style="border-color:#666666; border-top-style: dashed; border-right-style: dashed; border-width: 1px; padding: 2px">{{ $row->amount }}</td>                
                    <td style="border-color:#666666; border-top-style: dashed; border-right-style: dashed; border-width: 1px; padding: 2px">{{ $row->name }}</td>                
                    <td style="border-color:#666666; border-top-style: dashed; border-right-style: dashed; border-width: 1px; padding: 2px">{{ $row->nit }}</td>                
                </tr>
                {{ $nro++ }}    
            @endforeach
            
        </tbody>
    </table>
</div>

</html>