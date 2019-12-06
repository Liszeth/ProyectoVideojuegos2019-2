using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class CargarObjetoController : MonoBehaviour
{
    public bool isPickable = true;
    void OnTriggerEnter2D(Collider2D col)
    {
        if(col.tag == "manos")
        {
            col.GetComponentInParent<RecogiendoObjetoController>().ObjetoRecoger = this.gameObject;
            col.GetComponentInParent<RecogiendoObjetoController>().recogiendolos = true;
        }
    }

    void OnTriggerExit2D(Collider2D col)
    {
        if (col.tag == "manos")
        {
            col.GetComponentInParent<RecogiendoObjetoController>().ObjetoRecoger = null;
            col.GetComponentInParent<RecogiendoObjetoController>().recogiendolos = false;
        }
    }
}
