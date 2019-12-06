using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class EmpujarPuertaController : MonoBehaviour
{
    public bool isPickable = true;
    void OnTriggerEnter2D(Collider2D col)
    {
        if (col.tag == "manos")
        {
            col.GetComponentInParent<PersonajeController>().ObjetoRecoger = this.gameObject;
            col.GetComponentInParent<PersonajeController>().recogiendolos = true;
        }
    }

    void OnTriggerExit2D(Collider2D col)
    {
        if (col.tag == "manos")
        {
            col.GetComponentInParent<PersonajeController>().ObjetoRecoger = null;
        }
    }
}
