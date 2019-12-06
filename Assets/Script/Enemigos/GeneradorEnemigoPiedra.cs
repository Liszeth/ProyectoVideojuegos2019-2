using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class GeneradorEnemigoPiedra : MonoBehaviour
{
    public GameObject piedra;
    public Transform posPiedra;
    public float tiempoCrear = 0;
    private int numGolpes = 0;
    

    void Awake()
    {
        GenerarPiedra();
    }

    void CrearPiedra()
    {
        Instantiate(piedra, posPiedra.position, Quaternion.identity);
    }

    void GenerarPiedra()
    {
        InvokeRepeating("CrearPiedra", 0f, tiempoCrear);
    }
    
    void OnTriggerEnter2D(Collider2D colision)
    {
        if(colision.gameObject.tag == "bala")
        {
            numGolpes++;
            DestruirEne();
            Destroy(colision.gameObject);
        }
        if (colision.gameObject.tag == "espada_personaje")
        {
            numGolpes++;
            DestruirEne();
        }
    }

    void DestruirEne()
    {
        if(numGolpes > 2)
        {
            GetComponent<Animator>().SetInteger("EstadoEP", 1);
            Invoke("MorirEne", 0.8f);
        }
    }

    void MorirEne()
    {
        Destroy(gameObject);
    }
}
