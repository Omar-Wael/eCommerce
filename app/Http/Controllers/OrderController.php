<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Cart;
use Mpdf\Mpdf;

class OrderController extends Controller
{

    public function index()
    {
        return response()->json(Order::all()->load('user'));
    }

    public function checkout(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string',
            'customer_address' => 'required|string',
        ]);

        $cartItems = Cart::with('product')->get();

        $order = Order::create([
            'customer_name' => $request->customer_name,
            'customer_address' => $request->customer_address,
            'total' => $cartItems->sum(fn($item) => $item->quantity * $item->product->price),
        ]);

        $cartItems->each(fn($item) => $item->delete());

        return response()->json(['message' => 'Order placed', 'order' => $order]);
    }

    public function generateInvoice($order_id)
    {
        $order = Order::findOrFail($order_id);
        try {
            // Render the HTML content for the invoice
            $html = view('invoice', ['order' => $order])->render();

            // Create an instance of Mpdf
            $mpdf = new Mpdf();

            // Write the HTML to the PDF
            $mpdf->WriteHTML($html);

            // Define a file name for the downloaded PDF
            $fileName = 'invoice_' . $order->id . '.pdf';

            // Generate PDF content as a string
            $pdfContent = $mpdf->Output('', \Mpdf\Output\Destination::STRING_RETURN);

            // Return a response forcing download
            return response($pdfContent)
                ->header('Content-Type', 'application/pdf')
                ->header('Content-Disposition', 'attachment; filename="' . $fileName . '"')
                ->header('Cache-Control', 'private, max-age=0, must-revalidate');
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to generate PDF: ' . $e->getMessage()], 500);
        }
    }
}