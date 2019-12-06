using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class GenerarMonedaController : MonoBehaviour
{
    public bool generando = false;
    public GameObject moneda;
    private PersonajeController personaje;
    void GeneraMoneda()
    {
        Instantiate(moneda, transform.position, Quaternion.identity);
    }
    void OnCollisionEnter2D(Collision2D collision)
    {
        if (collision.gameObject.tag == "personaje" && generando==true)
        {
            Invoke("GeneraMoneda", 0);
        }
    }
}
