using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class RoperPisoController : MonoBehaviour
{
    public int saltos = 0;
    void Start()
    {
        
    }

    // Update is called once per frame
    void Update()
    {
        Romper();
    }

    void Romper()
    {
        if(saltos > 2)
        {
            Destroy(gameObject);
            saltos = 0;
        }
        
    }
    void OnCollisionEnter2D(Collision2D collision)
    {
        if (collision.gameObject.tag == "personaje")
        {

            saltos++;
        }
    }
}
