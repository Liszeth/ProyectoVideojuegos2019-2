using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class PisoMovilController : MonoBehaviour
{
    public Transform objtivoMov;
    public float movimiento = 3;

    private Vector3 inicio, fin;
    void Start()
    {
        //hacer que objetivo no sea hijo para que no se mueva
        if (objtivoMov != null)
        {
            objtivoMov.parent = null;
            inicio = transform.position; //pos inicial de Muro Movil
            fin = objtivoMov.position; // pos del obj movimiento
        }
    }

    // Update is called once per frame
    void Update()
    {
        
    }
    void FixedUpdate()
    {
        if (objtivoMov != null)
        {
            float velocidad = movimiento * Time.deltaTime;
            transform.position = Vector3.MoveTowards(transform.position, objtivoMov.position, velocidad);
        }

        if (transform.position == objtivoMov.position)
        {
            objtivoMov.position = (objtivoMov.position == inicio) ? fin : inicio;//operador ternario
            //cuando pos de MuroMov concuerda con el objetivoMov
        }
    }
}
