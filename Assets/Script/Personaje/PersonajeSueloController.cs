using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class PersonajeSueloController : MonoBehaviour
{
    private PersonajeController personaje;
    void Start()
    {
        personaje = GetComponentInParent<PersonajeController>();
    }

    void OnCollisionEnter2D(Collision2D colision)
    {
        if (colision.gameObject.tag == "suelo_mov")
        {
            personaje.transform.parent = colision.transform;
        }
    }
    void OnCollisionStay2D(Collision2D colision)
    {
        if (colision.gameObject.tag == "suelo_mov")
        {
            personaje.transform.parent = colision.transform;
        }
    }
    void OnCollisionExit2D(Collision2D colision)
    {
        if (colision.gameObject.tag == "suelo_mov")
        {
            personaje.transform.parent = null;
        }
    }
}
