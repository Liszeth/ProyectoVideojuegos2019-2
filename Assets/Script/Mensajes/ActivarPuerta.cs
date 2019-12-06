using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class ActivarPuerta : MonoBehaviour
{
    private PersonajeController smsPersonaje;
    public GameObject fin;
    private BoxCollider2D puerta;
    void Start()
    {
        smsPersonaje = FindObjectOfType(typeof(PersonajeController)) as PersonajeController;
        puerta = transform.GetChild(3).GetComponent<BoxCollider2D>();
        puerta.enabled = false;

    }

    // Update is called once per frame
    void Update()
    {
    }

    void OnTriggerEnter2D(Collider2D colision)
    {
        if (colision.gameObject.tag == "act_puerta")
        {
            smsPersonaje.pasarNivel.GetComponent<TextMesh>().text = "!Puerta Abierta!";
            puerta.enabled = true;
            smsPersonaje.MostrarTextoFin();
        }
        
    }
}
