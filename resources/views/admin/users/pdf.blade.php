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
        <td>Name</td>
        <td>Email</td>
        <td>First Name</td>
        <td>Last Name</td>
        <td>Create at</td>
    </tr>
    </thead>
    <tbody>
    @foreach($data as $item)
        <tr>
            <td>{!! $item->name !!}</td>
            <td>{!! $item->email !!}</td>
            <td>{!! $item->firstname !!}</td>
            <td>{!! $item->lastname !!}</td>
            <td>{!! convertDateTime($item->created_at) !!}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>