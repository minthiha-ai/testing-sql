<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SQLController extends Controller
{
    public function execute(Request $request)
    {
        // Validate that the SQL query is provided
        $request->validate([
            'sql_query' => 'required|string',
        ]);

        // Get the SQL query from the request
        $sqlQuery = $request->input('sql_query');

        try {
            // Execute the raw SQL query
            DB::statement($sqlQuery);

            // Redirect back with a success message
            return back()->with('success', 'SQL query executed successfully.');
        } catch (\Exception $e) {
            // Catch and handle any errors during query execution
            // Return the error message to be displayed in the error log textarea
            return back()->with('error', $e->getMessage());
        }
    }
}
