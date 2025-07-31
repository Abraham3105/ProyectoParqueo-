const oracledb = require("oracledb");
const { OpenDB } = require("../db/oracleConnection");

const pagarReserva = async (req, res) => {
  const { id_reserva, id_metodo_pago, id_descuento } = req.body;

  try {
    const connection = await OpenDB();

    const result = await connection.execute(
      `BEGIN
         SP_PAGAR_RESERVA(
           :p_id_reserva,
           :p_id_metodo_pago,
           :p_id_descuento,
           :p_id_pago,
           :p_id_factura,
           :p_total_cobrado,
           :p_resultado
         );
       END;`,
      {
        p_id_reserva:     { val: id_reserva, dir: oracledb.BIND_IN },
        p_id_metodo_pago: { val: id_metodo_pago, dir: oracledb.BIND_IN },
        p_id_descuento:   { val: id_descuento || null, dir: oracledb.BIND_IN },
        p_id_pago:        { dir: oracledb.BIND_OUT, type: oracledb.NUMBER },
        p_id_factura:     { dir: oracledb.BIND_OUT, type: oracledb.NUMBER },
        p_total_cobrado:  { dir: oracledb.BIND_OUT, type: oracledb.NUMBER },
        p_resultado:      { dir: oracledb.BIND_OUT, type: oracledb.STRING, maxSize: 200 }
      },
      { autoCommit: true }
    );

    const out = result.outBinds;

    if (out.p_resultado !== "PAGO_OK") {
      return res.status(400).json({ ok: false, mensaje: out.p_resultado });
    }

    res.status(200).json({
      ok: true,
      mensaje: "Pago exitoso y reserva activada",
      id_pago: out.p_id_pago,
      id_factura: out.p_id_factura,
      total: out.p_total_cobrado
    });

    await connection.close();
  } catch (err) {
    console.error("Error al pagar reserva:", err);
    res.status(500).json({ ok: false, mensaje: "Error al procesar el pago." });
  }
};

module.exports = {
  pagarReserva
};
