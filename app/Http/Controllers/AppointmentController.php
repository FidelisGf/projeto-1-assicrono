<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    // Criar uma nova consulta para um paciente específico
    public function create(Request $request, $pacienteId)
    {
        $appointment = Appointment::create([
            'data_hora' => $request->input('data_hora'),
            'paciente_id' => $pacienteId
        ]);
        return $appointment;
    }

    public function read($id)
    {
        return Appointment::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->update($request->only('data_hora'));
        return $appointment;
    }

    public function cancel($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->status = 'cancelada';
        $appointment->save();
        return response()->json(['message' => 'Consulta cancelada.']);
    }

    public function confirm($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->status = 'confirmada';
        $appointment->save();
        return response()->json(['message' => 'Consulta confirmada.']);
    }

    public function delete($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();
        return response()->json(['message' => 'Consulta deletada com sucesso.']);
    }
}