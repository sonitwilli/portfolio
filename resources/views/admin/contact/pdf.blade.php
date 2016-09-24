<html>
<style>
    table{
        border-collapse: collapse;
        border-spacing: 0;
    }
    td{
        padding: 5px;
        border: 1px solid #ddd;
    }
</style>
<body>
<h2>Contact List {!! date('d.m.Y H:i:s') !!}</h2>
<table>
    <thead>
    <tr>
        <td>name</td>
        <td>Email</td>
        <td>Phone</td>
        <td>Address</td>
        <td>Message</td>
    </tr>
    </thead>
    <tbody>
    @foreach($data as $item)
        <tr>
            <td>{!! $item->name !!}</td>
            <td>{!! $item->email !!}</td>
            <td>{!! $item->phone !!}</td>
            <td>{!! $item->address !!}</td>
            <td>{!! $item->content !!}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>