<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>User ID</th>
            <th>Query</th>
            <th>Status</th>
            <th>Created At</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($leads as $lead)
            <tr>
                <td>{{ $lead->id }}</td>
                <td>{{ optional($lead->user)->id }}</td>
                <td>{{ $lead->query }}</td>
                <td>{{ $lead->status }}</td>
                <td>{{ $lead->created_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
