using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class GenerarBalaController : MonoBehaviour
{
    public GameObject bala;
    void Awake()
    {
        GenerarBala();
    }

    void CrearBala()
    {
        Instantiate(bala, transform.position, Quaternion.Euler(0f, 0f, -151f));
    }

    void GenerarBala()
    {
        InvokeRepeating("CrearBala", 0f, 4f);
    }

    void OnTriggerEnter2D(Collider2D colision)
    {
        if (colision.tag == "espada")
        {
            Destroy(gameObject);
        }
        if (colision.gameObject.tag == "shuriken")
        {
            Destroy(colision.gameObject);
            Destroy(gameObject);
        }
    }
}
